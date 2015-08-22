<?php
namespace Serfhos\Teamleader\Model;

class AbstractModel
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var array
     */
    protected $customFields = [];

    /**
     * @var boolean
     */
    protected $deleted;

    /**
     * @var boolean
     */
    private $created = false;

    /**
     * Returns the Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the $id
     *
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the CustomFields
     *
     * @return array
     */
    public function getCustomFields()
    {
        return (array) $this->customFields;
    }

    /**
     * Add custom field to array
     *
     * @param integer $id
     * @param mixed $value
     * @return void
     */
    public function addCustomField($id, $value)
    {
        $this->customFields[$id] = $value;
    }

    /**
     * Sets the $customFields
     *
     * @param array $customFields
     * @return void
     */
    public function setCustomFields(array $customFields)
    {
        $this->customFields = $customFields;
    }

    /**
     * Returns the Deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return (bool) $this->deleted;
    }

    /**
     * Sets the $deleted
     *
     * @param boolean $deleted
     * @return void
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * Parse date in date time object
     *
     * @param mixed $value
     * @return \DateTime
     */
    protected function parseDate($value)
    {
        $date = null;
        if (($value === '' || is_array($value)) === false) {
            if (!($value instanceof \DateTime)) {
                // Can be interpreted as integer
                if (((string) (int) $value === (string) $value)) {
                    $date = new \DateTime('@' . $value);
                } elseif (is_string($value)) {
                    $date = new \DateTime($value);
                }
            }
        }
        return $date;
    }

    /**
     * Create object with given data
     *
     * @param  array $data
     * @param static $instance
     * @return static
     */
    public static function _create($data, $instance = null)
    {
        if (null === $instance || !is_object($instance)) {
            $instance = new static();
        }

        $instance->created = true;

        foreach ($data as $key => $value) {
            $key = trim($key);
            switch ($key) {
                case substr($key, 0, 3) == 'cf_':
                    $id = substr($key, 3);
                    $instance->addCustomField($id, $value);
                    break;

                case 'language_name':
                    break;

                case 'deleted':
                    $instance->setDeleted(($value == 1));
                    break;

                default:
                    // Ignore empty values
                    if (empty($value)) {
                        continue;
                    }

                    $key = str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
                    $methodName = 'set' . $key;
                    if (method_exists($instance, $methodName)) {
                        call_user_func(array($instance, $methodName), $value);
                    } else {
                        $key = lcfirst($key);
                        // Always try to set the key
                        if (!isset($instance->{$key})) {
                            $instance->{$key} = $value;
                        }
                    }
            }
        }

        return $instance;
    }
}
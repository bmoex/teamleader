<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Abstract
 *
 * @package Serfhos\Teamleader\Model
 */
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
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
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
                // Skip some -other- elements
                case 'language_name':
                case 'for':
                case 'contact_or_company':
                    break;

                case substr($key, 0, 3) == 'cf_':
                    $id = substr($key, 3);
                    $instance->addCustomField($id, $value);
                    break;

                case 'for_id':
                case 'contact_or_company_id':
                    $target = isset($data['for']) ? $data['for'] : $data['contact_or_company'];
                    $id = isset($data['for_id']) ? $data['for_id'] : $data['contact_or_company_id'];

                    switch ($target) {
                        case 'company':
                            $value = new Company();
                            $value->setId($id);
                            break;

                        case 'contact':
                            $value = new Contact();
                            $value->setId($id);
                            break;

                        default:
                            exit('SHOULD STILL MAP: ' . $target . '!');
                            break;
                    }

                    if (method_exists($instance, 'setClient')) {
                        $instance->setClient($value);
                    } else {
                        exit('Method setClient should exist!');
                    }
                    break;

                case
                'deleted':
                    $instance->setDeleted(($value == 1));
                    break;

                default:

                    $key = str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
                    $methodName = 'set' . $key;
                    if (method_exists($instance, $methodName)) {
                        call_user_func(array($instance, $methodName), $value);
                    } else {
                        // Ignore empty values
                        if (empty($value)) {
                            continue;
                        }

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

    /**
     * Add custom field to array
     *
     * @param integer $id
     * @param mixed $value
     * @return static
     */
    public function addCustomField($id, $value)
    {
        $this->customFields[$id] = $value;
        return $this;
    }

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
     * @return static
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * Sets the $customFields
     *
     * @param array $customFields
     * @return static
     */
    public function setCustomFields(array $customFields)
    {
        $this->customFields = $customFields;
        return $this;
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
     * @return static
     */
    public function setDeleted($deleted)
    {
        $this->deleted = (bool) $deleted;
        return $this;
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
                    // Fail safe datetime generation
                    $value = str_replace('/', '-', $value);
                    $date = new \DateTime($value);
                }
            }
        }
        return $date;
    }
}
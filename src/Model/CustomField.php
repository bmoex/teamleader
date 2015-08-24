<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: CustomField
 *
 * @package Serfhos\Teamleader\Model
 */
class CustomField extends AbstractModel
{

    /**
     * Types
     */
    const TYPE_CONTACT = 'contact';
    const TYPE_COMPANY = 'company';
    const TYPE_SALE = 'sale';
    const TYPE_PROJECT = 'project';
    const TYPE_INVOICE = 'invoice';
    const TYPE_TICKET = 'ticket';
    const TYPE_MILESTONE = 'milestone';

    /**
     * @var string
     */
    protected $for;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $group;

    /**
     * @var array
     */
    protected $options;

    /**
     * Returns the Group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Sets the Group
     *
     * @param string $group
     * @return void
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * Returns the For
     *
     * @return string
     */
    public function getFor()
    {
        return $this->for;
    }

    /**
     * Sets the For
     *
     * @param string $for
     * @return void
     */
    public function setFor($for)
    {
        $this->for = $for;
    }

    /**
     * Returns the Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the Name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the Type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the Type
     *
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the Options
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets the Options
     *
     * @param array $options
     * @return void
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

}
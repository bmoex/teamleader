<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Department
 *
 * @package Serfhos\Teamleader\Model
 */
class Department extends AbstractModel
{

    /**
     * @var string
     */
    protected $name;

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

}
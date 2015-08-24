<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: DealPhase
 *
 * @package Serfhos\Teamleader\Model
 */
class DealPhase extends AbstractModel
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
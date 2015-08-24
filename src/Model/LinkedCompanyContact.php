<?php
namespace Serfhos\Teamleader\Model;

/**
 * Relation: Company => Contact
 *
 * @package Serfhos\Teamleader\Model
 */
class LinkedCompanyContact
{

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $function;

    /**
     * Returns the Function
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Sets the Function
     *
     * @param string $function
     * @return void
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }

    /**
     * Returns the Contact
     *
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the Contact
     *
     * @param Contact $contact
     * @return void
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
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

}
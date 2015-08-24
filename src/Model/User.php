<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: User
 *
 * @package Serfhos\Teamleader\Model
 */
class User extends AbstractModel
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $gsm;

    /**
     * @var string
     */
    protected $telephone;

    /**
     * @var integer
     */
    protected $teamId;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var array
     */
    protected $moduleAccess;

    /**
     * @var string
     */
    protected $agendaAccess;

    /**
     * Returns the Active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Sets the Active
     *
     * @param boolean $active
     * @return void
     */
    public function setActive($active)
    {
        $this->active = $active;
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
     * Returns the Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the Email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the Gsm
     *
     * @return string
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * Sets the Gsm
     *
     * @param string $gsm
     * @return void
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;
    }

    /**
     * Returns the Telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets the Telephone
     *
     * @param string $telephone
     * @return void
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Returns the TeamId
     *
     * @return int
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Sets the TeamId
     *
     * @param int $teamId
     * @return void
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;
    }

    /**
     * Returns the Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the Title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the AgendaAccess
     *
     * @return string
     */
    public function getAgendaAccess()
    {
        return $this->agendaAccess;
    }

    /**
     * Sets the AgendaAccess
     *
     * @param string $agendaAccess
     * @return void
     */
    public function setAgendaAccess($agendaAccess)
    {
        $this->agendaAccess = $agendaAccess;
    }

    /**
     * Returns the ModuleAccess
     *
     * @return array
     */
    public function getModuleAccess()
    {
        return $this->moduleAccess;
    }

    /**
     * Sets the ModuleAccess
     *
     * @param array $moduleAccess
     * @return void
     */
    public function setModuleAccess(array $moduleAccess)
    {
        $this->moduleAccess = $moduleAccess;
    }

}
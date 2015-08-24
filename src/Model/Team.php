<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Team
 *
 * @package Serfhos\Teamleader\Model
 */
class Team extends AbstractModel
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $teamLeaderId;

    /**
     * @var string
     */
    protected $teamLeaderName;

    /**
     * Returns the TeamLeaderName
     *
     * @return string
     */
    public function getTeamLeaderName()
    {
        return $this->teamLeaderName;
    }

    /**
     * Sets the TeamLeaderName
     *
     * @param string $teamLeaderName
     * @return void
     */
    public function setTeamLeaderName($teamLeaderName)
    {
        $this->teamLeaderName = $teamLeaderName;
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
     * Returns the TeamLeaderId
     *
     * @return string
     */
    public function getTeamLeaderId()
    {
        return $this->teamLeaderId;
    }

    /**
     * Sets the TeamLeaderId
     *
     * @param string $teamLeaderId
     * @return void
     */
    public function setTeamLeaderId($teamLeaderId)
    {
        $this->teamLeaderId = $teamLeaderId;
    }

    /**
     * Setter for the Teamleader api naming convention
     *
     * @param string $name
     * @return void
     */
    protected function setTeamName($name)
    {
        $this->name = $name;
    }

}
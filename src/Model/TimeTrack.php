<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: TimeTrack
 *
 * @package Serfhos\Teamleader\Model
 */
class TimeTrack extends AbstractModel
{

    /**
     * @var integer
     */
    protected $durationMinutes;

    /**
     * @var integer
     */
    protected $personId;

    /**
     * @var string
     */
    protected $personName;

    /**
     * Returns the PersonName
     *
     * @return string
     */
    public function getPersonName()
    {
        return $this->personName;
    }

    /**
     * Sets the PersonName
     *
     * @param string $personName
     * @return void
     */
    public function setPersonName($personName)
    {
        $this->personName = $personName;
    }

    /**
     * Returns the DurationMinutes
     *
     * @return int
     */
    public function getDurationMinutes()
    {
        return $this->durationMinutes;
    }

    /**
     * Sets the DurationMinutes
     *
     * @param int $durationMinutes
     * @return void
     */
    public function setDurationMinutes($durationMinutes)
    {
        $this->durationMinutes = $durationMinutes;
    }

    /**
     * Returns the PersonId
     *
     * @return int
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * Sets the PersonId
     *
     * @param int $personId
     * @return void
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
    }

}
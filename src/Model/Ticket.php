<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Ticket
 *
 * @package Serfhos\Teamleader\Model
 */
class Ticket extends AbstractModel
{

    /**
     * Types
     */
    const STATUS_NEW = 'new';
    const STATUS_OPEN = 'open';
    const STATUS_WAITING_FOR_CLIENT = 'waiting_for_client';
    const STATUS_ESCALATED_THIRDPARTY = 'escalated_thirdparty';
    const STATUS_NOT_CLOSED = 'not_closed';
    const STATUS_CLOSED = 'closed';

    /**
     * @var string
     */
    protected $for;

    /**
     * @var integer
     */
    protected $forId;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var \DateTime
     */
    protected $dateCreated;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var integer
     */
    protected $responsibleSysClientId;

    /**
     * @var integer
     */
    protected $timeSpent;

    /**
     * @var array<TimeTrack>
     */
    protected $timeTracking;

    /**
     * Returns the TimeSpent
     *
     * @return int
     */
    public function getTimeSpent()
    {
        return $this->timeSpent;
    }

    /**
     * Sets the TimeSpent
     *
     * @param int $timeSpent
     * @return void
     */
    public function setTimeSpent($timeSpent)
    {
        $this->timeSpent = $timeSpent;
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
     * Returns the ForId
     *
     * @return int
     */
    public function getForId()
    {
        return $this->forId;
    }

    /**
     * Sets the ForId
     *
     * @param int $forId
     * @return void
     */
    public function setForId($forId)
    {
        $this->forId = $forId;
    }

    /**
     * Returns the Subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the Subject
     *
     * @param string $subject
     * @return void
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Returns the DateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Sets the DateCreated
     *
     * @param \DateTime $dateCreated
     * @return void
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $this->parseDate($dateCreated);
    }

    /**
     * Returns the Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the Status
     *
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the Description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the ResponsibleSysClientId
     *
     * @return int
     */
    public function getResponsibleSysClientId()
    {
        return $this->responsibleSysClientId;
    }

    /**
     * Sets the ResponsibleSysClientId
     *
     * @param int $responsibleSysClientId
     * @return void
     */
    public function setResponsibleSysClientId($responsibleSysClientId)
    {
        $this->responsibleSysClientId = $responsibleSysClientId;
    }

    /**
     * Returns the TimeTracking
     *
     * @return array
     */
    public function getTimeTracking()
    {
        return $this->timeTracking;
    }

    /**
     * Sets the TimeTracking
     *
     * @param array $timeTracking
     * @return void
     */
    public function setTimeTracking($timeTracking)
    {
        foreach ($timeTracking as $id => $track) {
            if ($track instanceof TimeTrack) {
                $this->addTimeTrack($track);
            } else {
                $track['id'] = $id + 1;
                $this->addTimeTrack(TimeTrack::_create($track));
            }
        }
    }

    /**
     * @param TimeTrack $timeTrack
     */
    public function addTimeTrack(TimeTrack $timeTrack)
    {
        $this->timeTracking[] = $timeTrack;
    }

}
<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Task
 *
 * @package Serfhos\Teamleader\Model
 */
class Task extends AbstractModel
{

    /**
     * @var \DateTime
     */
    protected $dueDate;

    /**
     * @var string
     */
    protected $priority;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var boolean
     */
    protected $done;

    /**
     * @var string
     */
    protected $ownerName;

    /**
     * @var string
     */
    protected $taskType;

    /**
     * @var integer
     */
    protected $estimateTotalTimeMinutes;

    /**
     * @var integer
     */
    protected $timeTrackedMinutes;

    /**
     * @var integer
     */
    protected $timeRemainingMinutes;

    /**
     * Returns the TimeRemainingMinutes
     *
     * @return int
     */
    public function getTimeRemainingMinutes()
    {
        return $this->timeRemainingMinutes;
    }

    /**
     * Sets the TimeRemainingMinutes
     *
     * @param int $timeRemainingMinutes
     * @return void
     */
    public function setTimeRemainingMinutes($timeRemainingMinutes)
    {
        $this->timeRemainingMinutes = $timeRemainingMinutes;
    }

    /**
     * Returns the DueDate
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Sets the DueDate
     *
     * @param \DateTime $dueDate
     * @return void
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $this->parseDate($dueDate);
    }

    /**
     * Returns the Priority
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Sets the Priority
     *
     * @param string $priority
     * @return void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
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
     * Returns the Done
     *
     * @return boolean
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Sets the Done
     *
     * @param boolean $done
     * @return void
     */
    public function setDone($done)
    {
        $this->done = $done;
    }

    /**
     * Returns the OwnerName
     *
     * @return string
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * Sets the OwnerName
     *
     * @param string $ownerName
     * @return void
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $ownerName;
    }

    /**
     * Returns the TaskType
     *
     * @return string
     */
    public function getTaskType()
    {
        return $this->taskType;
    }

    /**
     * Sets the TaskType
     *
     * @param string $taskType
     * @return void
     */
    public function setTaskType($taskType)
    {
        $this->taskType = $taskType;
    }

    /**
     * Returns the EstimateTotalTimeMinutes
     *
     * @return int
     */
    public function getEstimateTotalTimeMinutes()
    {
        return $this->estimateTotalTimeMinutes;
    }

    /**
     * Sets the EstimateTotalTimeMinutes
     *
     * @param int $estimateTotalTimeMinutes
     * @return void
     */
    public function setEstimateTotalTimeMinutes($estimateTotalTimeMinutes)
    {
        $this->estimateTotalTimeMinutes = $estimateTotalTimeMinutes;
    }

    /**
     * Returns the TimeTrackedMinutes
     *
     * @return int
     */
    public function getTimeTrackedMinutes()
    {
        return $this->timeTrackedMinutes;
    }

    /**
     * Sets the TimeTrackedMinutes
     *
     * @param int $timeTrackedMinutes
     * @return void
     */
    public function setTimeTrackedMinutes($timeTrackedMinutes)
    {
        $this->timeTrackedMinutes = $timeTrackedMinutes;
    }

}
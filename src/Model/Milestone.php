<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Milestone
 *
 * @package Serfhos\Teamleader\Model
 */
class Milestone extends AbstractModel
{

    /**
     * Billing types
     */
    const BILLING_TYPE_FIXED = 'fixed_price';
    const BILLING_TYPE_TIME_MATERIAL = 'time_and_material';

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $billingType;

    /**
     * @var \DateTime
     */
    protected $dueDate;

    /**
     * @var float
     */
    protected $budget;

    /**
     * @var boolean
     */
    protected $closed;

    /**
     * @var boolean
     */
    protected $invoiceable;

    /**
     * @var integer
     */
    protected $timeTrackedMinutes;

    /**
     * @var integer
     */
    protected $tasksTimeRemainingMinutes;

    /**
     * @var integer
     */
    protected $tasksTimeOverrunMinutes;

    /**
     * Returns the TasksTimeOverrunMinutes
     *
     * @return int
     */
    public function getTasksTimeOverrunMinutes()
    {
        return $this->tasksTimeOverrunMinutes;
    }

    /**
     * Sets the TasksTimeOverrunMinutes
     *
     * @param int $tasksTimeOverrunMinutes
     * @return void
     */
    public function setTasksTimeOverrunMinutes($tasksTimeOverrunMinutes)
    {
        $this->tasksTimeOverrunMinutes = $tasksTimeOverrunMinutes;
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
     * Returns the BillingType
     *
     * @return string
     */
    public function getBillingType()
    {
        return $this->billingType;
    }

    /**
     * Sets the BillingType
     *
     * @param string $billingType
     * @return void
     */
    public function setBillingType($billingType)
    {
        $this->billingType = $billingType;
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
     * Returns the Budget
     *
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Sets the Budget
     *
     * @param float $budget
     * @return void
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * Returns the Invoiceable
     *
     * @return boolean
     */
    public function getInvoiceable()
    {
        return $this->invoiceable;
    }

    /**
     * Sets the Invoiceable
     *
     * @param boolean $invoiceable
     * @return void
     */
    public function setInvoiceable($invoiceable)
    {
        $this->invoiceable = (bool) $invoiceable;
    }

    /**
     * Returns the Closed
     *
     * @return boolean
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Sets the Closed
     *
     * @param boolean $closed
     * @return void
     */
    public function setClosed($closed)
    {
        $this->closed = (bool) $closed;
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

    /**
     * Returns the TasksTimeRemainingMinutes
     *
     * @return int
     */
    public function getTasksTimeRemainingMinutes()
    {
        return $this->tasksTimeRemainingMinutes;
    }

    /**
     * Sets the TasksTimeRemainingMinutes
     *
     * @param int $tasksTimeRemainingMinutes
     * @return void
     */
    public function setTasksTimeRemainingMinutes($tasksTimeRemainingMinutes)
    {
        $this->tasksTimeRemainingMinutes = $tasksTimeRemainingMinutes;
    }

}
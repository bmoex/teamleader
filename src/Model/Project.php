<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Project
 *
 * @package Serfhos\Teamleader\Model
 */
class Project extends AbstractModel
{

    /**
     * @var string
     */
    protected $projectNr;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $phase;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var string
     */
    protected $descriptionHtml;

    /**
     * @var double
     */
    protected $budgetIndication;

    /**
     * @var double
     */
    protected $budgetSpentInternal;

    /**
     * @var double
     */
    protected $budgetSpentExternal;

    /**
     * @var Contact|Company
     */
    protected $client;

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
     * Returns the Phase
     *
     * @return string
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * Sets the Phase
     *
     * @param string $phase
     * @return void
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
    }

    /**
     * Returns the StartDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets the StartDate
     *
     * @param \DateTime $date
     * @return void
     */
    public function setStartDate($date)
    {
        $this->startDate = $this->parseDate($date);
    }

    /**
     * Returns the Client
     *
     * @return Company|Contact
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sets the Client
     *
     * @param Company|Contact $client
     * @return void
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * Returns the ProjectNr
     *
     * @return string
     */
    public function getProjectNr()
    {
        return $this->projectNr;
    }

    /**
     * Sets the ProjectNr
     *
     * @param string $projectNr
     * @return void
     */
    public function setProjectNr($projectNr)
    {
        $this->projectNr = $projectNr;
    }

    /**
     * Returns the DescriptionHtml
     *
     * @return string
     */
    public function getDescriptionHtml()
    {
        return $this->descriptionHtml;
    }

    /**
     * Sets the DescriptionHtml
     *
     * @param string $descriptionHtml
     * @return void
     */
    public function setDescriptionHtml($descriptionHtml)
    {
        $this->descriptionHtml = $descriptionHtml;
    }

    /**
     * Returns the BudgetIndication
     *
     * @return float
     */
    public function getBudgetIndication()
    {
        return $this->budgetIndication;
    }

    /**
     * Sets the BudgetIndication
     *
     * @param float $budgetIndication
     * @return void
     */
    public function setBudgetIndication($budgetIndication)
    {
        $this->budgetIndication = (double) $budgetIndication;
    }

    /**
     * Returns the BudgetSpentInternal
     *
     * @return float
     */
    public function getBudgetSpentInternal()
    {
        return $this->budgetSpentInternal;
    }

    /**
     * Sets the BudgetSpentInternal
     *
     * @param float $budgetSpentInternal
     * @return void
     */
    public function setBudgetSpentInternal($budgetSpentInternal)
    {
        $this->budgetSpentInternal = (double) $budgetSpentInternal;
    }

    /**
     * Returns the BudgetSpentExternal
     *
     * @return float
     */
    public function getBudgetSpentExternal()
    {
        return $this->budgetSpentExternal;
    }

    /**
     * Sets the BudgetSpentExternal
     *
     * @param float $budgetSpentExternal
     * @return void
     */
    public function setBudgetSpentExternal($budgetSpentExternal)
    {
        $this->budgetSpentExternal = (double) $budgetSpentExternal;
    }

}
<?php
namespace Serfhos\Teamleader\Model;

class Project extends AbstractModel
{

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

}
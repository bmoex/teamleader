<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Deal
 *
 * @package Serfhos\Teamleader\Model
 */
class Deal extends AbstractModel
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var Contact|Company
     */
    protected $client;

    /**
     * @var string
     */
    protected $customerName;

    /**
     * @var array<DealItem>
     */
    protected $items;

    /**
     * @var integer
     */
    protected $quotationNr;

    /**
     * @var string
     */
    protected $totalPriceExclVat;

    /**
     * @var integer
     */
    protected $probability;

    /**
     * @var integer
     */
    protected $phaseId;

    /**
     * @var integer
     */
    protected $responsibleUserId;

    /**
     * @var \DateTime
     */
    protected $entryDate;

    /**
     * @var \DateTime
     */
    protected $latestActivityDate;

    /**
     * @var \DateTime
     */
    protected $closeDate;

    /**
     * @var \DateTime
     */
    protected $dateLost;

    /**
     * @var string
     */
    protected $reasonRefused;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var integer
     */
    protected $sourceId;

    /**
     * @var integer
     */
    protected $description;

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
     * Returns the CustomerName
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Sets the CustomerName
     *
     * @param string $customerName
     * @return void
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * Returns the QuotationNr
     *
     * @return int
     */
    public function getQuotationNr()
    {
        return $this->quotationNr;
    }

    /**
     * Sets the QuotationNr
     *
     * @param int $quotationNr
     * @return void
     */
    public function setQuotationNr($quotationNr)
    {
        $this->quotationNr = $quotationNr;
    }

    /**
     * Returns the TotalPriceExclVat
     *
     * @return string
     */
    public function getTotalPriceExclVat()
    {
        return $this->totalPriceExclVat;
    }

    /**
     * Sets the TotalPriceExclVat
     *
     * @param string $totalPriceExclVat
     * @return void
     */
    public function setTotalPriceExclVat($totalPriceExclVat)
    {
        $this->totalPriceExclVat = $totalPriceExclVat;
    }

    /**
     * Returns the Probability
     *
     * @return int
     */
    public function getProbability()
    {
        return $this->probability;
    }

    /**
     * Sets the Probability
     *
     * @param int $probability
     * @return void
     */
    public function setProbability($probability)
    {
        $this->probability = $probability;
    }

    /**
     * Returns the PhaseId
     *
     * @return int
     */
    public function getPhaseId()
    {
        return $this->phaseId;
    }

    /**
     * Sets the PhaseId
     *
     * @param int $phaseId
     * @return void
     */
    public function setPhaseId($phaseId)
    {
        $this->phaseId = $phaseId;
    }

    /**
     * Returns the ResponsibleUserId
     *
     * @return int
     */
    public function getResponsibleUserId()
    {
        return $this->responsibleUserId;
    }

    /**
     * Sets the ResponsibleUserId
     *
     * @param int $responsibleUserId
     * @return void
     */
    public function setResponsibleUserId($responsibleUserId)
    {
        $this->responsibleUserId = $responsibleUserId;
    }

    /**
     * Returns the EntryDate
     *
     * @return \DateTime
     */
    public function getEntryDate()
    {
        return $this->entryDate;
    }

    /**
     * Sets the EntryDate
     *
     * @param \DateTime $entryDate
     * @return void
     */
    public function setEntryDate($entryDate)
    {
        $this->entryDate = $this->parseDate($entryDate);
    }

    /**
     * Returns the LatestActivityDate
     *
     * @return \DateTime
     */
    public function getLatestActivityDate()
    {
        return $this->latestActivityDate;
    }

    /**
     * Sets the LatestActivityDate
     *
     * @param \DateTime $latestActivityDate
     * @return void
     */
    public function setLatestActivityDate($latestActivityDate)
    {
        $this->latestActivityDate = $this->parseDate($latestActivityDate);
    }

    /**
     * Returns the CloseDate
     *
     * @return \DateTime
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * Sets the CloseDate
     *
     * @param \DateTime $closeDate
     * @return void
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $this->parseDate($closeDate);
    }

    /**
     * Returns the DateLost
     *
     * @return \DateTime
     */
    public function getDateLost()
    {
        return $this->dateLost;
    }

    /**
     * Sets the DateLost
     *
     * @param \DateTime $dateLost
     * @return void
     */
    public function setDateLost($dateLost)
    {
        $this->dateLost = $this->parseDate($dateLost);
    }

    /**
     * Returns the ReasonRefused
     *
     * @return string
     */
    public function getReasonRefused()
    {
        return $this->reasonRefused;
    }

    /**
     * Sets the ReasonRefused
     *
     * @param string $reasonRefused
     * @return void
     */
    public function setReasonRefused($reasonRefused)
    {
        $this->reasonRefused = $reasonRefused;
    }

    /**
     * Returns the Source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets the Source
     *
     * @param string $source
     * @return void
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * Returns the SourceId
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * Sets the SourceId
     *
     * @param int $sourceId
     * @return void
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * Returns the Items
     *
     * @return array<DealItem>
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Sets the Items
     *
     * @param array $items
     * @return void
     */
    public function setItems($items)
    {
        // Reset current items
        $this->items = [];
        foreach ((array) $items as $id => $item) {
            if ($item instanceof DealItem) {
                $this->addItem($item);
            } else {
                $item['id'] = $id + 1;
                $this->addItem(DealItem::_create($item));
            }
        }
    }

    /**
     * Add a separate item
     *
     * @param DealItem $item
     * @return void
     */
    public function addItem(DealItem $item)
    {
        $this->items[] = $item;
    }

    /**
     * Returns the Description
     *
     * @return int
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the Description
     *
     * @param int $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
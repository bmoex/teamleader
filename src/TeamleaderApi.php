<?php
namespace Serfhos\Teamleader;

use Serfhos\Teamleader\Configuration;
use Serfhos\Teamleader\Request;

class TeamleaderApi
{

    /**
     * @var Request\CrmRequest
     */
    private $crmRequest;

    /**
     * @var Request\CustomFieldsRequest
     */
    private $customFieldsRequest;

    /**
     * @var Request\DealsRequest
     */
    private $dealsRequest;

    /**
     * @var Request\FilesRequest
     */
    private $filesRequest;

    /**
     * @var Request\GeneralRequest
     */
    private $generalRequest;

    /**
     * @var Request\InvoicesRequest
     */
    private $invoicesRequest;

    /**
     * @var Request\MeetingsRequest
     */
    private $meetingsRequest;

    /**
     * @var Request\MeetingsRequest
     */
    private $notesRequest;

    /**
     * @var Request\PlanningRequest
     */
    private $planningRequest;

    /**
     * @var Request\ProductsRequest
     */
    private $productsRequest;

    /**
     * @var Request\ProjectsRequest
     */
    private $projectsRequest;

    /**
     * @var Request\SubscriptionsRequest
     */
    private $subscriptionsRequest;

    /**
     * @var Request\TicketsRequest
     */
    private $ticketsRequest;

    /**
     * @var Request\TimetrackingTasksRequest
     */
    private $timetrackingTasksRequest;

    /**
     * @var Request\UsersTeamsRequest
     */
    private $usersTeamsRequest;

    /**
     * Initialize Teamleader API
     *
     * @param string $group
     * @param string $secret
     */
    public function __construct($group = null, $secret = null)
    {
        $credentials = Configuration\ApiCredentials::getInstance();
        if (null !== $group) {
            $credentials->setGroup($group);
        }
        if (null !== $group) {
            $credentials->setSecret($secret);
        }
    }

    /**
     * Returns the Users & Teams Request
     *
     * @return Request\UsersTeamsRequest
     */
    public function usersTeams()
    {
        if ($this->usersTeamsRequest === null) {
            $this->usersTeamsRequest = new Request\UsersTeamsRequest();
        }
        return $this->usersTeamsRequest;
    }

    /**
     * Returns the CRM Request
     *
     * @return Request\CrmRequest
     */
    public function crm()
    {
        if ($this->crmRequest === null) {
            $this->crmRequest = new Request\CrmRequest();
        }
        return $this->crmRequest;
    }

    /**
     * Returns the Custom Fields Request
     *
     * @return Request\CustomFieldsRequest
     */
    public function customFields()
    {
        if ($this->customFieldsRequest === null) {
            $this->customFieldsRequest = new Request\CustomFieldsRequest();
        }
        return $this->customFieldsRequest;
    }

    /**
     * Returns the Deals Request
     *
     * @return Request\DealsRequest
     */
    public function deals()
    {
        if ($this->dealsRequest === null) {
            $this->dealsRequest = new Request\DealsRequest();
        }
        return $this->dealsRequest;
    }

    /**
     * Returns the Files Request
     *
     * @return Request\FilesRequest
     */
    public function files()
    {
        if ($this->filesRequest === null) {
            $this->filesRequest = new Request\FilesRequest();
        }
        return $this->filesRequest;
    }

    /**
     * Returns the General Request
     *
     * @return Request\GeneralRequest
     */
    public function general()
    {
        if ($this->generalRequest === null) {
            $this->generalRequest = new Request\GeneralRequest();
        }
        return $this->generalRequest;
    }

    /**
     * Returns the Invoices Request
     *
     * @return Request\InvoicesRequest
     */
    public function invoices()
    {
        if ($this->invoicesRequest === null) {
            $this->invoicesRequest = new Request\InvoicesRequest();
        }
        return $this->invoicesRequest;
    }

    /**
     * Returns the Meetings Request
     *
     * @return Request\MeetingsRequest
     */
    public function meetings()
    {
        if ($this->meetingsRequest === null) {
            $this->meetingsRequest = new Request\MeetingsRequest();
        }
        return $this->meetingsRequest;
    }

    /**
     * Returns the Notes Request
     *
     * @return Request\MeetingsRequest
     */
    public function notes()
    {
        if ($this->meetingsRequest === null) {
            $this->meetingsRequest = new Request\MeetingsRequest();
        }
        return $this->notesRequest;
    }

    /**
     * Returns the Planning Request
     *
     * @return Request\PlanningRequest
     */
    public function planning()
    {
        if ($this->planningRequest === null) {
            $this->planningRequest = new Request\PlanningRequest();
        }
        return $this->planningRequest;
    }

    /**
     * Returns the Products Request
     *
     * @return Request\ProductsRequest
     */
    public function products()
    {
        if ($this->productsRequest === null) {
            $this->productsRequest = new Request\ProductsRequest();
        }
        return $this->productsRequest;
    }

    /**
     * Returns the Projects Request
     *
     * @return Request\ProjectsRequest
     */
    public function projects()
    {
        if ($this->projectsRequest === null) {
            $this->projectsRequest = new Request\ProjectsRequest();
        }
        return $this->projectsRequest;
    }

    /**
     * Returns the Subscriptions Request
     *
     * @return Request\SubscriptionsRequest
     */
    public function subscriptions()
    {
        if ($this->subscriptionsRequest === null) {
            $this->subscriptionsRequest = new Request\SubscriptionsRequest();
        }
        return $this->subscriptionsRequest;
    }

    /**
     * Returns the Tickets Request
     *
     * @return Request\TicketsRequest
     */
    public function tickets()
    {
        if ($this->ticketsRequest === null) {
            $this->ticketsRequest = new Request\TicketsRequest();
        }
        return $this->ticketsRequest;
    }

    /**
     * Returns the Timetracking & Tasks Request
     *
     * @return Request\TimetrackingTasksRequest
     */
    public function timetrackingTasks()
    {
        if ($this->timetrackingTasksRequest === null) {
            $this->timetrackingTasksRequest = new Request\TimetrackingTasksRequest();
        }
        return $this->timetrackingTasksRequest;
    }

}
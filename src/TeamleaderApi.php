<?php
namespace Serfhos\Teamleader;

use Serfhos\Teamleader\Configuration;
use Serfhos\Teamleader\Request;

class TeamleaderApi
{

    /**
     * @var Request\GeneralRequest
     */
    protected $generalRequest;

    /**
     * @var Request\CrmRequest
     */
    protected $crmRequest;

    /**
     * @var Request\ProjectsRequest
     */
    protected $projectsRequest;

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
     * @return Request\GeneralRequest
     */
    protected function general()
    {
        if ($this->generalRequest === null) {
            $this->generalRequest = new Request\GeneralRequest();
        }
        return $this->generalRequest;
    }

    /**
     * @return Request\CrmRequest
     */
    protected function crm()
    {
        if ($this->crmRequest === null) {
            $this->crmRequest = new Request\CrmRequest();
        }
        return $this->crmRequest;
    }

    /**
     * @return Request\ProjectsRequest
     */
    protected function projects()
    {
        if ($this->projectsRequest === null) {
            $this->projectsRequest = new Request\ProjectsRequest();
        }
        return $this->projectsRequest;
    }
}
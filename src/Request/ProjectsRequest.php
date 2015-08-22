<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Exception;
use Serfhos\Teamleader\Model;

/**
 * Request: Projects from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class ProjectsRequest extends AbstractRequest
{

    /**
     * @param integer $amount
     * @param integer $page
     * @param string $searchBy
     * @param boolean $showActiveOnly
     * @param array $customFields
     * @return array <Model\Project>
     */
    public function getProjects(
        $amount = 100,
        $page = 0,
        $searchBy = null,
        $showActiveOnly = null,
        array $customFields = null
    ) {
        $action = 'getProjects.php';
        $parameters = [
            'amount' => $amount,
            'pageno' => $page,
            'searchby' => $searchBy,
            'show_active_only' => $showActiveOnly,
        ];

        if (null !== $searchBy) {
            $parameters['searchby'] = $searchBy;
        }

        if (null !== $showActiveOnly) {
            $parameters['show_active_only'] = $searchBy;
        }

        if (null !== $customFields) {
            $parameters['selected_customfields'] = $searchBy;
        }

        $response = $this->doRequest($action, $parameters);
        $projects = [];
        foreach ($response as $project) {
            $projects[] = Model\Project::_create($project);
        }
        return $projects;
    }

    /**
     * @param Model\Contact $contact
     * @param Model\Company $company
     * @param boolean $deepSearch
     * @param boolean $showInactiveProjects
     * @return array <Model\Project>
     * @throws Exception\ArgumentException
     */
    public function getProjectsByClient(
        Model\Contact $contact = null,
        Model\Company $company = null,
        $deepSearch = false,
        $showInactiveProjects = null
    ) {
        if ($contact !== null && $company !== null) {
            throw new Exception\ArgumentException(
                'Both contact and company are given, only one is expected.',
                1440167693
            );
        }

        $action = 'getProjectsByClient.php';
        $parameters = [];
        if ($contact !== null) {
            $parameters['contact_or_company'] = 'contact';
            $parameters['contact_or_company_id'] = $contact->getId();
        } elseif ($company !== null) {
            $parameters['contact_or_company'] = 'company';
            $parameters['contact_or_company_id'] = $company->getId();
        }

        $parameters['deep_search'] = $deepSearch;
        if (null !== $showInactiveProjects) {
            $parameters['show_inactive_projects'] = $showInactiveProjects;
        }

        $response = $this->doRequest($action, $parameters);

        $projects = [];
        foreach ($response as $project) {
            $projects[] = Model\Project::_create($project);
        }
        return $projects;
    }

    /**
     * @return Model\Project
     */
    public function getProject()
    {
    }

    /**
     * @param Model\Project $project
     * @return boolean
     */
    public function addProject(Model\Project $project)
    {
    }

    /**
     * @param Model\Project $project
     * @return array <Model\Milestone>
     */
    public function getMilestonesByProject(Model\Project $project)
    {
    }

    /**
     * @return Model\Milestone
     */
    public function getMilestone()
    {
    }

    /**
     * @param Model\Milestone $milestone
     * @return boolean
     */
    public function addMilestone(Model\Milestone $milestone)
    {
    }

    /**
     * @param Model\Milestone $milestone
     * @return boolean
     */
    public function deleteMilestone(Model\Milestone $milestone)
    {
    }

    /**
     * @return array<Model\Task>
     */
    public function getTasksByMilestone()
    {
    }

    /**
     * @return array<Model\Contact|Model\Company>
     */
    public function getRelatedPartiesByProject()
    {
    }

    /**
     * @return boolean
     */
    public function addRelatedPartyToProject(Model\Contact $contact = null, Model\Company $company = null)
    {
        if ($contact !== null) {
        }
        if ($company !== null) {
        }
    }
}
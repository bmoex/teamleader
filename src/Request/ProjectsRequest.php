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
     * Get all projects
     *
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
     * Get all projects by defined client
     *
     * @param Model\Contact $contact
     * @param Model\Company $company
     * @param boolean $deepSearch
     * @param boolean $showInactiveProjects
     * @return array<Model\Project>
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

        $client = null;
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
     * Get project details
     *
     * @param integer $id
     * @return Model\Project
     */
    public function getProject($id)
    {
        $action = 'getProject.php';
        $parameters = [
            'project_id' => $id,
        ];

        $response = $this->doRequest($action, $parameters);
        if (!empty($response)) {
            return Model\Project::_create($response);
        }
        return null;
    }

    /**
     * Add project
     *
     * @todo finish responsible id's
     * @param Model\Project $project
     * @param Model\Milestone $milestone
     * @return boolean
     * @throws Exception\ArgumentException
     */
    public function addProject(Model\Project $project, Model\Milestone $milestone)
    {
        if ($project->getId() > 0) {
            throw new Exception\ArgumentException('An teamleader ID is already set in project, add is not allowed.',
                1440437772);
        }
        if ($milestone->getId() > 0) {
            throw new Exception\ArgumentException('An teamleader ID is already set in milestone, add is not allowed.',
                1440437773);
        }

        $action = 'addProject.php';
        $parameters = [
            'project_name' => $project->getTitle(),
            'project_budget' => $project->getBudgetIndication(),
            //@todo
            //'project_responsible_user_id' => $project->getResponsibleUserId(),
            'project_start_date' => $project->getStartDate()->format('d/m/Y'),
            'milestone_title' => $milestone->getTitle(),
            'milestone_budget' => $milestone->getBudget(),
            'milestone_invoiceable' => $milestone->getInvoiceable(),
            'milestone_due_date' => $milestone->getDueDate()->format('d/m/Y'),
            'milestone_billing_type' => $milestone->getBillingType(),
            //@todo
            //'milestone_responsible_user_id' => $milestone->getResponsibleUserId(),
        ];

        $client = $project->getClient();
        if ($client instanceof Model\Contact) {
            $parameters['contact_or_company'] = 'contact';
            $parameters['contact_or_company_id'] = $client->getId();
        } elseif ($client instanceof Model\Company) {
            $parameters['contact_or_company'] = 'company';
            $parameters['contact_or_company_id'] = $client->getId();
        }

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * @param Model\Project $project
     * @param boolean $includeDetails
     * @return array <Model\Milestone>
     */
    public function getMilestonesByProject(Model\Project $project, $includeDetails = null)
    {
        $action = 'getMilestonesByProject.php';
        $parameters = [
            'project_id' => $project->getId(),
        ];

        if (null !== $includeDetails) {
            $parameters['include_details'] = $includeDetails;
        }

        $response = $this->doRequest($action, $parameters);
        $milestones = [];
        foreach ((array) $response as $milestone) {
            $milestones[] = Model\Milestone::_create($milestone);
        }
        return $milestones;
    }

    /**
     * @return Model\Milestone
     */
    public function getMilestone($id)
    {
        $action = 'getMilestone.php';
        $parameters = [
            'milestone_id' => $id,
        ];

        $response = $this->doRequest($action, $parameters);
        if (!empty($response)) {
            return Model\Milestone::_create($response);
        }
        return null;
    }

    /**
     * Add milestone to project
     *
     * @param Model\Project $project
     * @param Model\Milestone $milestone
     * @param Model\Milestone $parentMilestone
     * @return boolean
     * @throws Exception\ArgumentException
     */
    public function addMilestone(
        Model\Project $project,
        Model\Milestone $milestone,
        Model\Milestone $parentMilestone = null
    ) {
        if ($milestone->getId() > 0) {
            throw new Exception\ArgumentException('An teamleader ID is already set, add is not allowed.',
                1440437852);
        }

        $action = 'addMilestone.php';
        $parameters = [
            'project_id' => $project->getId(),
            'title' => $milestone->getTitle(),
            'budget' => $milestone->getBudget(),
            'invoiceable' => $milestone->getInvoiceable(),
            'due_date' => $milestone->getDueDate()->format('d/m/Y'),
            //@todo
            //'responsible_crm_client_id' => $milestone->getResponsibleUserId(),
            'billing_type' => $milestone->getBillingType(),
        ];

        if (null !== $parentMilestone) {
            $parameters['critical_path'] = $parentMilestone->getId();
        }

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Delete milestone
     *
     * @param Model\Milestone $milestone
     * @return boolean
     * @throws Exception\ArgumentException
     */
    public function deleteMilestone(Model\Milestone $milestone)
    {
        if ($milestone->getId() > 0) {
            throw new Exception\ArgumentException('An teamleader ID is already set, delete is not allowed.',
                1440437853);
        }

        $action = 'deleteMilestone.php';
        $parameters = [
            'milestone_id' => $milestone->getId(),
        ];
        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Get all tasks by given milestone
     *
     * @param Model\Milestone $milestone
     * @return array<Model\Task>
     */
    public function getTasksByMilestone(Model\Milestone $milestone)
    {
        $action = 'getTasksByMilestone.php';
        $parameters = [
            'milestone_id' => $milestone,
        ];

        $response = $this->doRequest($action, $parameters);
        $tasks = [];
        foreach ((array) $response as $task) {
            $tasks[] = Model\Task::_create($task);
        }
        return $tasks;
    }

    /**
     * Get all linked clients based on given project
     *
     * @return array<Model\LinkedProjectClient>
     */
    public function getRelatedPartiesByProject(Model\Project $project)
    {
        $action = 'getRelatedPartiesByProject.php';
        $parameters = [
            'project_id' => $project->getId(),
        ];

        $response = $this->doRequest($action, $parameters);
        $parties = [];
        foreach ($response as $client) {
            $projectClient = new Model\LinkedProjectClient();
            $projectClient->setProject($project);
            switch ($client['type']) {
                case 'company':
                    $projectClient->setClient(Model\Company::_create($client));
                    break;

                case 'contact':
                    $projectClient->setClient(Model\Contact::_create($client));
                    break;
            }

            $projectClient->setGroup($client['group']);
            $projectClient->setRole($client['role']);
            $parties[] = $projectClient;
        }
        return $parties;
    }

    /**
     * Add related party to project
     *
     * @param Model\LinkedProjectClient $projectClient
     * @return boolean
     */
    public function addRelatedPartyToProject(Model\LinkedProjectClient $projectClient)
    {
        $action = 'addRelatedPartyToProject.php';
        $parameters = [
            'project_id' => $projectClient->getProject()->getId(),
            'group' => $projectClient->getGroup(),
            'role' => $projectClient->getRole(),
        ];

        $client = $projectClient->getClient();
        if ($client instanceof Model\Contact) {
            $parameters['contact_or_company'] = 'contact';
            $parameters['contact_or_company_id'] = $client->getId();
        } elseif ($client instanceof Model\Company) {
            $parameters['contact_or_company'] = 'company';
            $parameters['contact_or_company_id'] = $client->getId();
        }

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Get all users based on given project
     *
     * @return array
     */
    public function getUsersOnProject(Model\Project $project)
    {
        $action = 'getUsersOnProject.php';
        $parameters = [
            'project_id' => $project->getId(),
        ];

        return $this->doRequest($action, $parameters);
    }
}
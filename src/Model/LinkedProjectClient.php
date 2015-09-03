<?php
namespace Serfhos\Teamleader\Model;

/**
 * Relation: Project => Contact/Company
 *
 * @package Serfhos\Teamleader\Model
 */
class LinkedProjectClient
{

    /**
     * @var string
     */
    protected $group;

    /**
     * @var Project
     */
    protected $project;

    /**
     * @var Contact|Company|User
     */
    protected $client;

    /**
     * @var string
     */
    protected $role;

    // @TODO
    // should be an external access role here..

    /**
     * Returns the Project
     *
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Sets the Project
     *
     * @param Project $project
     * @return void
     */
    public function setProject(Project $project)
    {
        $this->project = $project;
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
     * Returns the Role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Sets the Role
     *
     * @param string $role
     * @return void
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Returns the Group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Sets the Group
     *
     * @param string $group
     * @return void
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

}
<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Model;

/**
 * Request: General information from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class GeneralRequest extends AbstractRequest
{

    /**
     * I don't know why this is also displayed in the general page
     * Use UsersTeamsRequest::getUsers() instead
     *
     * @see http://apidocs.teamleader.be/general.php
     * @see UsersTeamsRequest::getUsers()
     * @deprecated
     * @return array<Model\User>
     */
    public function getUsers()
    {
        $usersTeamsRequest = new UsersTeamsRequest();
        return $usersTeamsRequest->getUsers();
    }

    /**
     * Get all departments
     *
     * @return array<\Serfhos\Teamleader\Model\Department>
     */
    public function getDepartments()
    {
        $action = 'getDepartments.php';

        $response = $this->doRequest($action, []);
        $departments = [];
        foreach ($response as $department) {
            $departments[] = Model\Department::_create($department);
        }
        return $departments;
    }

    /**
     * Get all tags
     *
     * @return array<Model\Tag>
     */
    public function getTags()
    {
        $action = 'getTags.php';

        $response = $this->doRequest($action, []);
        $tags = [];
        foreach ($response as $id => $value) {
            $tag = new Model\Tag();
            $tag->setId($id);
            $tag->setName($value);
            $tags[] = $tag;
        }
        return $tags;
    }

    /**
     * @param string $objectType
     * @return array <Model\Segment>
     */
    public function getSegments($objectType)
    {
        $action = 'getSegments.php';
        $parameters = [
            'object_type' => $objectType
        ];

        return $this->doRequest($action, $parameters);
        // @TODO map to model
        /**
         * $segments = [];
         * foreach ($response as $id => $value) {
         * }
         * return $segments;
         */
    }
}
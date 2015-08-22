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
     * @return array<Model\User>
     */
    public function getUsers()
    {
        $action = 'getUsers.php';
        $response = $this->doRequest($action);
        $users = [];
        foreach ($response as $user) {
            $users[] = Model\User::_create($user);
        }

        return $users;
    }

    /**
     * @return array<\Serfhos\Teamleader\Model\Department>
     */
    public function getDepartments()
    {
        $action = 'getDepartments.php';
    }

    /**
     * //@TODO
     * @return array<\Serfhos\Teamleader\Model\Tag>
     */
    public function getTags()
    {
        $action = 'getTags.php';
    }

    /**
     * //@TODO
     * @return array<\Serfhos\Teamleader\Model\Segment>
     */
    public function getSegments()
    {
        $action = 'getSegments.php';
    }
}
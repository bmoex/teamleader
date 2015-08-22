<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Model;

/**
 * Request: Users & Teams requests from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class UserTeamsRequest extends AbstractRequest
{

    /**
     * @param $showInactiveUsers
     * @return array<Model\User>
     */
    public function getUsers($showInactiveUsers)
    {
        $action = 'getUsers.php';
        $parameters = [];

        if (null !== $showInactiveUsers) {
            $parameters['show_inactive_users'] = $showInactiveUsers;
        }

        $response = $this->doRequest($action, $parameters);
        $users = [];
        foreach ($response as $user) {
            $users[] = Model\User::_create($user);
        }
        return $users;
    }

    public function getUserAccess(Model\User $user)
    {
    }

    public function getTeams()
    {
    }

}
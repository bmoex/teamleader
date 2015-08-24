<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Model;

/**
 * Request: Users & Teams requests from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class UsersTeamsRequest extends AbstractRequest
{

    /**
     * Get all users
     *
     * @param boolean $showInactiveUsers
     * @return array<Model\User>
     */
    public function getUsers($showInactiveUsers = null)
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

    /**
     * Load user access in given model
     *
     * @param Model\User $user
     * @return boolean success on loaded
     */
    public function loadUserAccess(Model\User $user)
    {
        if ($user->getId() > 0) {
            $action = 'getUserAccess.php';
            $parameters = [
                'user_id' => $user->getId()
            ];

            $response = $this->doRequest($action, $parameters);
            if (!empty($response)) {
                if (is_array($response['modules_available'])) {
                    $user->setModuleAccess($response['modules_available']);
                }
                if (!empty($response['agenda_access_level'])) {
                    $user->setAgendaAccess($response['agenda_access_level']);
                }
                return true;
            }
        }

        return false;
    }

    /**
     * Get all teams
     *
     * @return array<Model\Team>
     */
    public function getTeams()
    {
        $action = 'getTeams.php';

        $response = $this->doRequest($action);
        $teams = [];
        foreach ($response as $team) {
            $teams[] = Model\Team::_create($team);
        }
        return $teams;
    }

}
<?php
namespace Serfhos\Teamleader\Configuration;

/**
 * Singleton: Configuration: API Credentials
 *
 * @package Serfhos\Configuration
 */
class ApiCredentials
{

    /**
     * Private constructor so nobody else can instance it
     */
    private function __construct()
    {
    }

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return ApiCredentials The *Singleton* instance.
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * @var string
     */
    protected $group;

    /**
     * @var string
     */
    protected $secret;

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
     * Sets the $group
     *
     * @param string $group
     * @return void
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * Returns the Secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Sets the Secret
     *
     * @param string $secret
     * @return void
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * Add credentials to given fields
     *
     * @param array $fields
     * @return array
     */
    public function addCredentials(array $fields = [])
    {
        $fields['api_group'] = $this->getGroup();
        $fields['api_secret'] = $this->getSecret();
        return $fields;
    }

}
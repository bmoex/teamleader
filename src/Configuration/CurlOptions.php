<?php
namespace Serfhos\Teamleader\Configuration;

/**
 * Singleton: Configuration: CURL Options
 *
 * @package Serfhos\Configuration
 */
class CurlOptions
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
     * @return CurlOptions The *Singleton* instance.
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
     * Verify secured ssl connection
     *
     * @var boolean
     */
    protected $sslVerify;

    /**
     * The timeout
     *
     * @var integer
     */
    protected $timeOut = 30;

    /**
     * The user agent
     *
     * @var string
     */
    protected $userAgent;

    /**
     * @var integer
     */
    protected $port = 443;

    /**
     * Returns the SslVerify
     *
     * @return boolean
     */
    public function getSslVerify()
    {
        return (bool) $this->sslVerify;
    }

    /**
     * Sets the $sslVerify
     *
     * @param boolean $sslVerify
     * @return CurlOptions
     */
    public function setSslVerify($sslVerify)
    {
        $this->sslVerify = $sslVerify;
        return $this;
    }

    /**
     * Returns the TimeOut
     *
     * @return integer
     */
    public function getTimeOut()
    {
        return (int) $this->timeOut;
    }

    /**
     * Sets the $timeOut
     *
     * @param integer $timeOut
     * @return CurlOptions
     */
    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;
        return $this;
    }

    /**
     * Returns the UserAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Sets the $userAgent
     *
     * @param string $userAgent
     * @return CurlOptions
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Returns the Port
     *
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Sets the $port
     *
     * @param integer $port
     * @return CurlOptions
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * Create options based on target and parameters
     *
     * @param string $target
     * @param array $parameters
     * @return array
     */
    public function create($target, array $parameters = [])
    {
        $options = [];

        $options[CURLOPT_POST] = true;
        $options[CURLOPT_POSTFIELDS] = $parameters;

        // set options
        $options[CURLOPT_URL] = $target;
        $options[CURLOPT_PORT] = $this->getPort();
        $options[CURLOPT_USERAGENT] = $this->getUserAgent();
        $options[CURLOPT_FOLLOWLOCATION] = true;

        if (!$this->getSslVerify()) {
            $options[CURLOPT_SSL_VERIFYPEER] = false;
            $options[CURLOPT_SSL_VERIFYHOST] = false;
        }

        $options[CURLOPT_RETURNTRANSFER] = true;
        $options[CURLOPT_TIMEOUT] = $this->getTimeOut();
        return $options;
    }
}
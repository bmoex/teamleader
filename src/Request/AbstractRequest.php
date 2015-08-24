<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Configuration;
use Serfhos\Teamleader\Exception;

/**
 * Request: Generic usage of requests
 *
 * @package Serfhos\Teamleader\Request
 */
abstract class AbstractRequest
{

    /**
     * @var string
     */
    const API_URL = 'https://www.teamleader.be/api/';

    /**
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * Do request with configured fields
     *
     * @param string $target
     * @param array $fields
     * @return array
     */
    protected function doRequest($target, array $fields = [])
    {
        // Prepend with API url
        $url = static::API_URL . ltrim($target, '/');

        // Add api credentials to fields
        $fields = Configuration\ApiCredentials::getInstance()
            ->addCredentials($fields);

        return $this->_request($url, $fields);
    }

    /**
     * Execute the request
     *
     * @param  string $url
     * @param  array $fields
     * @return array
     * @throws Exception\DefaultException
     */
    private function _request($url, array $fields = [])
    {
        $curl = curl_init();

        $options = Configuration\CurlOptions::getInstance()
            ->setUserAgent('Serfhos Teamleader/' . static::VERSION)
            ->create($url, $fields);
        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);

        // Force default errors
        if (!empty(curl_errno($curl))) {
            throw new Exception\RequestException(curl_error($curl), curl_errno($curl));
        }

        // attempt to extract a reason to show in the exception
        $return = json_decode($response, true);

        // Make sure the request returns the correct response
        if ((int) $info['http_code'] !== 200) {
            if ($return !== false && isset($return['reason'])) {
                throw new Exception\HttpException($info['http_code'] . ': Teamleader - Bad Request. Reason: ' . $return['reason'],
                    1440163472);
            } else {
                throw new Exception\HttpException($info['http_code'] . ': Teamleader - Bad Request. Output: ' . $response,
                    1440163473);
            }
        }

        if (false === $return) {
            throw new Exception\DefaultException('Teamleader - Invalid response', 1440163474);
        } elseif (null === $return && !empty($response) && $response !== 'OK') {
            throw new Exception\DefaultException($response, 1440424467);
        }

        // return
        return $return;
    }

}
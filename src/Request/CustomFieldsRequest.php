<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Model;

/**
 * Request: Custom Fields requests from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class CustomFieldsRequest extends AbstractRequest
{

    /**
     * Get all custom fields of given type
     *
     * @param string $type Model\CustomField::TYPE_*
     * @return array<Model\CustomField>
     */
    public function getCustomFields($type)
    {
        $action = 'getCustomFields.php';
        $parameters = [
            'for' => $type
        ];
        $response = $this->doRequest($action, $parameters);

        $customFields = [];
        foreach ((array) $response as $field) {
            $customFields[] = Model\CustomField::_create($field);
        }
        return $customFields;
    }

    /**
     * Get specified custom field
     *
     * @param integer $id
     * @return Model\CustomField
     */
    public function getCustomFieldInfo($id)
    {
        $action = 'getCustomFieldInfo.php';
        $parameters = [
            'custom_field_id' => (int) $id,
        ];

        $response = $this->doRequest($action, $parameters);
        if (!empty($response)) {
            return Model\CustomField::_create($response);
        }
        return null;
    }

    /**
     * [!!!] Skipping..
     * This request is not documented for all custom field types
     *
     * @TODO
     * @see http://apidocs.teamleader.be/customfields.php
     */
    public function addCustomFieldOption()
    {
        throw new \Serfhos\Teamleader\Exception\RequestException('Method not implemented.', 1440413672);
    }

}
<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Model;

/**
 * Request: CRM requests from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class CrmRequest extends AbstractRequest
{

    public function addContact()
    {
    }

    public function updateContact()
    {
    }

    public function deleteContact()
    {
    }

    public function linkContactToCompany()
    {
    }

    /**
     * Get all contacts
     *
     * @param integer $amount
     * @param integer $page
     * @param string $searchBy
     * @param \DateTime $modifiedSince
     * @param array $customFields
     * @return array<Model\Contact>
     */
    public function getContacts($amount = 100, $page = 0, $searchBy = null, $modifiedSince = null, $customFields = null)
    {
        $action = 'getContacts.php';
        $parameters = [
            'amount' => $amount,
            'pageno' => $page,
        ];

        if (null !== $searchBy) {
            $parameters['searchby'] = $searchBy;
        }

        if (null !== $modifiedSince) {
            $parameters['modifiedsince'] = $modifiedSince->getTimestamp();
        }

        if (null !== $customFields) {
            $parameters['selected_customfields'] = implode(',', $customFields);
        }

        $response = $this->doRequest($action, $parameters);
        $contacts = [];
        foreach ((array) $response as $contact) {
            $contacts[] = Model\Contact::_create($contact);
        }
        return $contacts;
    }

    /**
     * Get contact by identifier
     *
     * @param integer $id
     * @return Model\Contact
     */
    public function getContact($id)
    {
        if ($id > 0) {
            $action = 'getContact.php';
            $parameters = [
                'contact_id' => $id,
            ];

            $response = $this->doRequest($action, $parameters);
            if (!empty($response)) {
                return Model\Contact::_create($response);
            }
        }

        return null;
    }

    /**
     * Get contact by identifier
     *
     * @param Model\Contact $contact
     * @return Model\Contact
     */
    public function loadContact(Model\Contact $contact)
    {
        if ($contact->getId() > 0) {
            $action = 'getContact.php';
            $parameters = [
                'contact_id' => $contact->getId(),
            ];

            $response = $this->doRequest($action, $parameters);
            if (!empty($response)) {
                return Model\Contact::_create($response, $contact);
            }
        }

        return null;
    }

    public function getContactsByCompany()
    {
    }

    public function addCompany()
    {
    }

    public function updateCompany()
    {
    }

    public function deleteCompany()
    {
    }

    public function getCompanies()
    {
    }

    public function getCompany()
    {
    }

    public function getBusinessTypes()
    {
    }
}
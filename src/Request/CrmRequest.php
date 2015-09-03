<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Exception\ArgumentException;
use Serfhos\Teamleader\Model;

/**
 * Request: CRM requests from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class CrmRequest extends AbstractRequest
{

    /**
     * Options for relation
     */
    const LINK_CONTACT_COMPANY_MODE_LINK = 'link';
    const LINK_CONTACT_COMPANY_MODE_UNLINK = 'unlink';

    /**
     * @param string $from
     * @param string $fromId
     * @return Model\Company|Model\Contact
     */
    public function getClient($from, $fromId)
    {
        switch ($from) {
            case 'contact':
                return $this->getContact($fromId);
                break;
            case 'company':
                return $this->getCompany($fromId);
                break;
        }
        return null;
    }

    /**
     * Add contact
     *
     * @param Model\Contact $contact
     * @param boolean $newsletter
     * @param boolean $autoMergeByName
     * @param boolean $autoMergeByEmail
     * @return boolean
     * @throws ArgumentException
     */
    public function addContact(
        Model\Contact $contact,
        $newsletter = false,
        $autoMergeByName = null,
        $autoMergeByEmail = null
    ) {
        if ($contact->getId() > 0) {
            throw new ArgumentException('An teamleader ID is already set, add is not allowed.', 1440405031);
        }

        $action = 'addContact.php';
        $parameters = $this->parseContactParameters($contact, array_filter([
            'automerge_by_name' => $autoMergeByName,
            'automerge_by_email' => $autoMergeByEmail
        ]));

        $parameters['newsletter'] = $newsletter;

        // Make sure contact_id is not set
        unset ($parameters['contact_id']);

        $id = $this->doRequest($action, $parameters);;
        if ($id > 0) {
            $contact->setId((int) $id);
            return true;
        }
        return false;
    }

    /**
     * Update contact
     *
     * @param Model\Contact $contact
     * @param boolean $trackChanges
     * @return bool
     * @throws ArgumentException
     */
    public function updateContact(Model\Contact $contact, $trackChanges = true)
    {
        if ((int) $contact->getId() === 0) {
            throw new ArgumentException('An teamleader ID is not set, update is not allowed.', 1440415214);
        }

        $action = 'updateContact.php';
        $parameters = $this->parseContactParameters($contact, ['track_changes' => $trackChanges]);

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Delete contact
     *
     * @param Model\Contact $contact
     * @return boolean
     * @throws ArgumentException
     */
    public function deleteContact(Model\Contact $contact)
    {
        if ((int) $contact->getId() === 0) {
            throw new ArgumentException('An teamleader ID is not set, update is not allowed.', 1440415247);
        }

        $action = 'deleteContact.php';
        $parameters = [
            'contact_id' => $contact->getId(),
        ];

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Update current company => contact relation
     *
     * @param Model\LinkedCompanyContact $companyContact
     * @param Model\Company $company
     * @param string $mode link|unlink
     * @return bool
     * @throws ArgumentException
     */
    public function linkContactToCompany(Model\LinkedCompanyContact $companyContact, Model\Company $company, $mode)
    {
        $action = 'linkContactToCompany.php';
        switch ($mode) {
            case static::LINK_CONTACT_COMPANY_MODE_LINK:
            case static::LINK_CONTACT_COMPANY_MODE_UNLINK:
                $parameters = [
                    'contact_id' => $companyContact->getContact()->getId(),
                    'company_id' => $company->getId(),
                    'mode' => $mode,
                    'function' => $companyContact->getFunction()
                ];
                break;

            default:
                throw new ArgumentException('Unknown mode given (' . $mode . ')', 1440407632);
                break;
        }
        return (bool) $this->doRequest($action, $parameters);
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

    /**
     * Get all contacts connected to company
     *
     * @param Model\Company $company
     * @return array<Model\LinkedCompanyContact>
     */
    public function getContactsByCompany(Model\Company $company)
    {
        if ($company->getId() > 0) {
            $action = 'getContactsByCompany.php';
            $parameters = [
                'company_id' => $company->getId(),
            ];

            $response = $this->doRequest($action, $parameters);
            $contacts = [];
            foreach ((array) $response as $contact) {
                $companyContact = new Model\LinkedCompanyContact();
                $companyContact->setContact(Model\Contact::_create($contact));
                $companyContact->setName($contact['name']);
                $companyContact->setFunction($contact['function']);

                $contacts[] = $companyContact;
            }
            return $contacts;
        }
        return null;
    }

    /**
     * Add company
     *
     * @param Model\Company $company
     * @param bool $autoMergeByName
     * @param bool $autoMergeByEmail
     * @param bool $autoMergeByVatCode
     * @return true
     * @throws ArgumentException
     */
    public function addCompany(
        Model\Company $company,
        $autoMergeByName = null,
        $autoMergeByEmail = null,
        $autoMergeByVatCode = null
    ) {
        if ($company->getId() > 0) {
            throw new ArgumentException('An teamleader ID is already set, add is not allowed.', 1440405030);
        }
        $action = 'addCompany.php';
        $parameters = $this->parseCompanyParameters($company, array_filter([
            'automerge_by_name' => $autoMergeByName,
            'automerge_by_email' => $autoMergeByEmail,
            'automerge_by_vat_code' => $autoMergeByVatCode,
        ]));

        // Make sure company_id is not set
        unset ($parameters['company_id']);

        $id = $this->doRequest($action, $parameters);;
        if ($id > 0) {
            $company->setId((int) $id);
            return true;
        }
        return false;
    }

    /**
     * Update company
     *
     * @param Model\Company $company
     * @param bool $trackChanges
     * @return bool
     * @throws ArgumentException
     */
    public function updateCompany(Model\Company $company, $trackChanges = true)
    {
        if ((int) $company->getId() === 0) {
            throw new ArgumentException('An teamleader ID is not set, update is not allowed.', 1440405032);
        }

        $action = 'updateCompany.php';
        $parameters = $this->parseCompanyParameters($company, ['track_changes' => $trackChanges]);

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Delete company
     *
     * @param Model\Company $company
     * @return bool
     * @throws ArgumentException
     */
    public function deleteCompany(Model\Company $company)
    {
        if ((int) $company->getId() === 0) {
            throw new ArgumentException('An teamleader ID is not set, update is not allowed.', 1440415178);
        }

        $action = 'deleteCompany.php';
        $parameters = [
            'company_id' => $company->getId(),
        ];

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Get all companies
     *
     * @param integer $amount
     * @param integer $page
     * @param string $searchBy
     * @param \DateTime $modifiedSince
     * @param array $customFields
     * @return array<Model\Company>
     */
    public function getCompanies(
        $amount = 100,
        $page = 0,
        $searchBy = null,
        $modifiedSince = null,
        $customFields = null
    ) {
        $action = 'getCompanies.php';
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
        $companies = [];
        foreach ((array) $response as $company) {
            $companies[] = Model\Company::_create($company);
        }
        return $companies;
    }

    /**
     * Get company
     *
     * @param integer $id
     * @return Model\Company
     */
    public function getCompany($id)
    {
        $action = 'getCompany.php';
        $parameters = [
            'company_id' => (int) $id
        ];

        $response = $this->doRequest($action, $parameters);
        if (!empty($response)) {
            return Model\Company::_create($response);
        }

        return null;
    }

    /**
     * Get all Business Types
     *
     * @param string $country country code according to ISO 3166-1 alpha-2. For Belgium: "BE"
     * @return array
     * @throws ArgumentException
     */
    public function getBusinessTypes($country)
    {
        if (strlen($country) !== 2) {
            throw new ArgumentException('The country needs to be an ISO3166-1 alpha-2 string', 1440402232);
        } elseif (preg_match("/^[a-zA-Z]+$/", $country) !== 1) {
            throw new ArgumentException('The country needs to be an ISO3166-1 alpha-2 string', 1440402233);
        }

        $action = 'getBusinessTypes.php';
        $parameters = [
            'country' => strtoupper($country)
        ];
        return $this->doRequest($action, $parameters);
    }

    /**
     * Parse data model of Teamleader for add/update
     *
     * @param Model\Company $company
     * @param array $parameters
     * @return array
     */
    protected function parseCompanyParameters(Model\Company $company, $parameters = [])
    {
        $fields = [
            'company_id' => $company->getId(),
            'name' => $company->getName(),
            'vat_code' => $company->getTaxCode(),
            'city' => $company->getCity(),
            'zipcode' => $company->getZipCode(),
            'street' => $company->getStreet(),
            'number' => $company->getNumber(),
            'country' => $company->getCountry(),
            'telephone' => $company->getTelephone(),
            'website' => $company->getWebsite(),
            'fax' => $company->getFax(),
            'email' => $company->getEmail(),
            'business_type' => $company->getBusinessType(),
        ];

        // @todo tags

        // Include dynamic extra addresses
        if ($company->getExtraAddresses()) {
            foreach ($company->getExtraAddresses() as $type => $data) {
                foreach ($data as $key => $value) {
                    $fields[$key . "_" . $type] = $value;
                }
            }
        }

        // Include the custom fields
        if ($company->getCustomFields()) {
            foreach ($company->getCustomFields() as $id => $value) {
                $fields['custom_field_' . $id] = $value;
            }
        }
        return array_merge($parameters, $fields);
    }

    /**
     * Parse data model of Teamleader for add/update
     *
     * @param Model\Contact $contact
     * @param array $parameters
     * @return array
     */
    protected function parseContactParameters(Model\Contact $contact, $parameters = [])
    {
        $fields = [
            'contact_id' => $contact->getId(),
            'forename' => $contact->getForename(),
            'surname' => $contact->getSurname(),
            'email' => $contact->getEmail(),
            'telephone' => $contact->getTelephone(),
            'gsm' => $contact->getGsm(),
            'website' => $contact->getWebsite(),
            'country' => $contact->getCountry(),
            'zipcode' => $contact->getZipcode(),
            'city' => $contact->getCity(),
            'street' => $contact->getStreet(),
            'number' => $contact->getNumber(),
            'language' => $contact->getLanguage(),
            'gender' => $contact->getGender(),
            'dob' => $contact->getDob(),
        ];

        // @todo tags

        // Include dynamic extra addresses
        if ($contact->getExtraAddresses()) {
            foreach ($contact->getExtraAddresses() as $type => $data) {
                foreach ($data as $key => $value) {
                    $fields[$key . "_" . $type] = $value;
                }
            }
        }

        // Include the custom fields
        if ($contact->getCustomFields()) {
            foreach ($contact->getCustomFields() as $id => $value) {
                $fields['custom_field_' . $id] = $value;
            }
        }
        return array_merge($parameters, $fields);
    }
}
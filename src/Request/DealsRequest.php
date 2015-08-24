<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Exception\ArgumentException;
use Serfhos\Teamleader\Model;

/**
 * Request: Deals requests from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class DealsRequest extends AbstractRequest
{

    /**
     * @todo test this function
     * @param Model\Deal $deal
     * @return boolean
     * @throws ArgumentException
     */
    public function addSale(Model\Deal $deal)
    {
        if ($deal->getId() > 0) {
            throw new ArgumentException('An teamleader ID is already set, add is not allowed.', 1440415028);
        }

        $action = 'addSale.php';
        $parameters = $this->parseDealParameters($deal);
        unset ($parameters['deal_id']);

        $id = $this->doRequest($action, $parameters);
        if ($id > 0) {
            $deal->setId((int) $id);
            return true;
        }

        return false;
    }

    /**
     * @todo test this function
     * @param Model\Deal $deal
     * @return boolean
     * @throws ArgumentException
     */
    public function updateDeal(Model\Deal $deal)
    {
        if ((int) $deal->getId() === 0) {
            throw new ArgumentException('An teamleader ID is not set, update is not allowed.', 1440415029);
        }

        $action = 'updateDeal.php';
        $parameters = $this->parseDealParameters($deal);

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Get all deals
     *
     * @param integer $amount
     * @param integer $page
     * @param string $searchBy
     * @param array $customFields
     * @return array<Model\Deal>
     */
    public function getDeals(
        $amount = 100,
        $page = 0,
        $searchBy = null,
        array $customFields = null
    ) {
        $action = 'getDeals.php';
        $parameters = [
            'amount' => $amount,
            'pageno' => $page,
        ];

        if (null !== $searchBy) {
            $parameters['searchby'] = $searchBy;
        }

        if (null !== $customFields) {
            $parameters['selected_customfields'] = implode(',', $customFields);
        }

        $response = $this->doRequest($action, $parameters);
        $deals = [];
        foreach ((array) $response as $deal) {
            $deals[] = Model\Deal::_create($deal);
        }
        return $deals;
    }

    /**
     * Get deals based on given client
     *
     * @param Model\Contact|null $contact
     * @param Model\Company $company
     * @return array<Model\Deal>
     * @throws ArgumentException
     */
    public function getDealsByContactOrCompany(Model\Contact $contact = null, Model\Company $company)
    {
        if ($contact !== null && $company !== null) {
            throw new ArgumentException(
                'Both contact and company are given, only one is expected.',
                1440418090
            );
        }
        $action = 'getDealsByContactOrCompany.php';

        $parameters = [];
        if ($contact !== null) {
            $parameters['contact_or_company'] = 'contact';
            $parameters['contact_or_company_id'] = $contact->getId();
        } elseif ($company !== null) {
            $parameters['contact_or_company'] = 'company';
            $parameters['contact_or_company_id'] = $company->getId();
        }

        $response = $this->doRequest($action, $parameters);
        $deals = [];
        foreach ((array) $response as $deal) {
            $deals[] = Model\Deal::_create($deal);
        }
        return $deals;
    }

    /**
     * Get deals based on given project
     *
     * @param Model\Project $project
     * @return array<Model\Deal>
     */
    public function getDealsByProject(Model\Project $project)
    {
        $action = 'getDealsByProject.php';
        $parameters = [
            'project_id' => $project->getId(),
        ];

        $response = $this->doRequest($action, $parameters);
        $deals = [];
        foreach ((array) $response as $deal) {
            $deals[] = Model\Deal::_create($deal);
        }
        return $deals;
    }

    /**
     * Get specified deal
     *
     * @param integer $id
     * @return Model\Deal
     */
    public function getDeal($id)
    {
        if ($id > 0) {
            $action = 'getDeal.php';
            $parameters = [
                'deal_id' => $id,
            ];

            $response = $this->doRequest($action, $parameters);
            if (!empty($response)) {
                return Model\Deal::_create($response);
            }
        }
        return null;
    }

    /**
     * Get Deal Phase changes
     *
     * @param Model\Deal $deal
     * @return array
     */
    public function getDealPhaseChanges(Model\Deal $deal)
    {
        $action = 'getDealPhaseChanges.php';
        $parameters = [
            'deal_id' => $deal->getId(),
        ];

        return $this->doRequest($action, $parameters);
    }

    /**
     * Get all deal phase changes
     *
     * @param \DateTime $from
     * @param \DateTime $to
     * @return array
     */
    public function getAllDealPhaseChanges(\DateTime $from, \DateTime $to)
    {
        $action = 'getAllDealPhaseChanges.php';
        $parameters = [
            'date_from' => $from->format('d/m/Y'),
            'date_to' => $to->format('d/m/Y'),
        ];

        return $this->doRequest($action, $parameters);
    }

    /**
     * Get all configured deal phases
     *
     * @return array<Model\DealPhase>
     */
    public function getDealPhases()
    {
        $action = 'getDealPhases.php';

        $response = $this->doRequest($action);
        $phases = [];
        foreach ((array) $response as $phase) {
            $phases[] = Model\DealPhase::_create($phase);
        }
        return $phases;
    }

    /**
     * Get all configured deal sources
     *
     * @return array<Model\DealSource>
     */
    public function getDealSources()
    {
        $action = 'getDealSources.php';

        $response = $this->doRequest($action);
        $sources = [];
        foreach ((array) $response as $source) {
            $sources[] = Model\DealSource::_create($source);
        }
        return $sources;
    }

    /**
     * Parse data model of Teamleader for add/update
     *
     * @param Model\Deal $deal
     * @param array $parameters
     * @return array
     */
    protected function parseDealParameters(Model\Deal $deal, $parameters = [])
    {
        $fields = [
            'deal_id' => $deal->getId(),
            'contact_or_company' => $deal->getFor(),
            'contact_or_company_id' => $deal->getForId(),
            'title' => $deal->getTitle(),
            'source' => $deal->getSource(),
            'description' => $deal->getDescription(),
            'phase_id' => $deal->getPhaseId(),
            'sys_department_id' => null,
            'responsible_sys_client_id' => null,
        ];

        $items = $deal->getItems();
        if (!empty($items)) {
            foreach ($items as $item) {
                /** @var Model\DealItem $item */
                $return['description_' . $item->getId()] = $item->getText();
                $return['price_' . $item->getId()] = $item->getPricePerUnit();
                $return['amount_' . $item->getId()] = $item->getAmount();
                $return['vat_' . $item->getId()] = $item->getVatRate();
            }
        }

        // Include the custom fields
        if ($deal->getCustomFields()) {
            foreach ($deal->getCustomFields() as $id => $value) {
                $fields['custom_field_' . $id] = $value;
            }
        }
        return array_merge($parameters, $fields);
    }
}
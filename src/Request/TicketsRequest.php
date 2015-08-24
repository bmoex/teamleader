<?php
namespace Serfhos\Teamleader\Request;

use Serfhos\Teamleader\Exception\ArgumentException;
use Serfhos\Teamleader\Model;

/**
 * Request: Subscriptions requests from Teamleader
 *
 * @package Serfhos\Teamleader
 */
class TicketsRequest extends AbstractRequest
{

    /**
     * Add ticket
     *
     * @param Model\Ticket $ticket
     * @param boolean $allowAutoReplies
     * @return boolean
     * @throws ArgumentException
     */
    public function addTicket(Model\Ticket $ticket, $allowAutoReplies = null)
    {
        if ($ticket->getId() > 0) {
            throw new ArgumentException('An teamleader ID is already set, add is not allowed.', 1440425065);
        }

        $action = 'addTicket.php';
        $parameters = $this->parseTicketParameters($ticket);

        if (null !== $allowAutoReplies) {
            $parameters['allow_autoreplies'] = $allowAutoReplies;
        }

        // Make sure contact_id is not set
        unset ($parameters['ticket_id']);

        $id = $this->doRequest($action, $parameters);;
        if ($id > 0) {
            $ticket->setId((int) $id);
            return true;
        }
        return false;
    }

    /**
     * Update ticket information
     *
     * @param Model\Ticket $ticket
     * @return boolean
     * @throws ArgumentException
     */
    public function updateTicket(Model\Ticket $ticket)
    {
        if ((int) $ticket->getId() === 0) {
            throw new ArgumentException('An teamleader ID is not set, update is not allowed.', 1440425101);
        }

        $action = 'updateTicket.php';
        $parameters = [
            'ticket_id' => $ticket->getId(),
            'ticket_status' => $ticket->getStatus(),
            'responsible_sys_client_id' => $ticket->getResponsibleSysClientId(),
        ];

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Add message to ticket
     *
     * @param Model\Ticket $ticket
     * @param Model\TicketMessage $message
     * @param string $ticketStatus Model\Ticket::STATUS_*
     * @param boolean $announceReply
     * @return boolean
     * @throws ArgumentException
     */
    public function addTicketMessage(
        Model\Ticket $ticket,
        Model\TicketMessage $message,
        $ticketStatus = null,
        $announceReply = null
    ) {
        if ((int) $ticket->getId() === 0) {
            throw new ArgumentException('An teamleader ID is not set in ticket, update is not allowed.', 1440425101);
        }
        if ($message->getId() > 0) {
            throw new ArgumentException('An teamleader ID is already set in message, add is not allowed.', 1440425065);
        }

        $action = 'addTicketMessage.php';
        $parameters = [
            'ticket_id' => $ticket->getId(),
            'message' => $message->getMessage(),
        ];

        if (null !== $message->getFrom()) {
            $parameters['from'] = $message->getFrom();
            $parameters['from_id'] = $message->getFromId();
        }

        if (null !== $ticketStatus) {
            $parameters['new_ticket_status'] = $ticketStatus;
        }

        if (null !== $announceReply) {
            $parameters['announce_reply'] = $announceReply;
        }

        $attachments = $message->getAttachments();
        foreach ((array) $attachments as $index => $attachment) {
            $file = file_get_contents($attachment);
            $parameters['attachment_' . $index . '_body_base64'] = base64_encode($file);
            $parameters['attachment_' . $index . '_body_base64'] = basename($attachment);
        }

        return (bool) $this->doRequest($action, $parameters);
    }

    /**
     * Retrieve tickets based on given client
     *
     * @param string $type Model\Ticket::TYPE_*
     * @param Model\Contact $contact
     * @param Model\Company $company
     * @param boolean $deepSearch
     * @return array<Model\Ticket>
     * @throws ArgumentException
     */
    public function getTickets($type, Model\Contact $contact = null, Model\Company $company = null, $deepSearch = null)
    {
        $action = 'getTickets.php';
        $parameters = [
            'type' => $type,
        ];

        if ($contact !== null && $company !== null) {
            throw new ArgumentException(
                'Both contact and company are given, only one is expected.',
                1440420214
            );
        } elseif (null !== $contact) {
            $parameters['contact_or_company'] = 'contact';
            $parameters['contact_or_company_id'] = $contact->getId();
        } elseif (null !== $company) {
            $parameters['contact_or_company'] = 'company';
            $parameters['contact_or_company_id'] = $company->getId();
        }

        if (null !== $deepSearch) {
            $parameters['deep_search'] = $deepSearch;
        }

        $response = $this->doRequest($action, $parameters);
        $tickets = [];
        foreach ((array) $response as $ticket) {
            $tickets[] = Model\Ticket::_create($ticket);
        }
        return $tickets;
    }

    /**
     * Get ticket
     *
     * @param integer $id
     * @param boolean $detailedTimeTracking
     * @return Model\Ticket
     */
    public function getTicket($id, $detailedTimeTracking = null)
    {
        $action = 'getTicket.php';
        $parameters = [
            'ticket_id' => $id,
        ];

        if (null !== $detailedTimeTracking) {
            $parameters['return_detailed_timetracking'] = $detailedTimeTracking;
        }

        $response = $this->doRequest($action, $parameters);
        if (!empty($response)) {
            return Model\Ticket::_create($response);
        }
        return null;
    }

    /**
     * Get all found messages inside a ticket
     *
     * @param Model\Ticket $ticket
     * @param boolean $includeInternal
     * @return Model\TicketMessage
     */
    public function getTicketMessages(Model\Ticket $ticket, $includeInternal = true)
    {
        $action = 'getTicketMessages.php';
        $parameters = [
            'ticket_id' => $ticket->getId(),
            'include_internal_message' => $includeInternal,
        ];

        $response = $this->doRequest($action, $parameters);
        $messages = [];
        foreach ((array) $response as $message) {
            $messages[] = Model\TicketMessage::_create($message);
        }
        return $messages;
    }

    /**
     * Retrieve single message of ticket
     *
     * @param integer $id
     * @return Model\TicketMessage
     */
    public function getTicketMessage($id)
    {
        $action = 'getTicketMessage.php';
        $parameters = [
            'message_id' => $id,
        ];

        $response = $this->doRequest($action, $parameters);
        if (!empty($response)) {
            return Model\TicketMessage::_create($response);
        }
        return null;
    }

    /**
     * Parse data model of Teamleader for add/update
     *
     * @param Model\Ticket $ticket
     * @param array $parameters
     * @return array
     */
    protected function parseTicketParameters(Model\Ticket $ticket, $parameters = [])
    {
        $fields = [
            'ticket_id' => $ticket->getId(),
            'subject' => $ticket->getSubject(),
            'description' => $ticket->getDescription(),
            'contact_or_company' => $ticket->getFor(),
            'contact_or_company_id' => $ticket->getForId(),
        ];

        // Include the custom fields
        if ($ticket->getCustomFields()) {
            foreach ($ticket->getCustomFields() as $id => $value) {
                $fields['custom_field_' . $id] = $value;
            }
        }
        return array_merge($parameters, $fields);
    }
}
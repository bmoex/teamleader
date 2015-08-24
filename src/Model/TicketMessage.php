<?php
namespace Serfhos\Teamleader\Model;

/**
 * Model: Ticket
 *
 * @package Serfhos\Teamleader\Model
 */
class TicketMessage extends AbstractModel
{

    /**
     * @var string
     */
    protected $message;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var Contact|Company
     */
    protected $client;

    /**
     * @var boolean
     */
    protected $internalMessage;

    /**
     * @var array
     */
    protected $attachments;

    /**
     * Returns the InternalMessage
     *
     * @return boolean
     */
    public function getInternalMessage()
    {
        return $this->internalMessage;
    }

    /**
     * Sets the InternalMessage
     *
     * @param boolean $internalMessage
     * @return void
     */
    public function setInternalMessage($internalMessage)
    {
        $this->internalMessage = (bool) $internalMessage;
    }

    /**
     * Returns the Message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the Message
     *
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Returns the Client
     *
     * @return Company|Contact
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sets the Client
     *
     * @param Company|Contact $client
     * @return void
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * Returns the Date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the Date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate($date)
    {
        $this->date = $this->parseDate($date);
    }

    /**
     * Returns the Attachments
     *
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * Sets the Attachments
     *
     * @param array $attachments
     * @return void
     */
    public function setAttachments(array $attachments)
    {
        $this->attachments = $attachments;
    }

    /**
     * Add single attachment
     *
     * @param array $attachment
     * @return void
     */
    public function addAttachment(array $attachment)
    {
        $this->attachments[] = $attachment;
    }
}
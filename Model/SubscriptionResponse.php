<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class SubscriptionResponse
 */
class SubscriptionResponse
{
    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $idTransaction;

    /**
     * @var array
     */
    private $messages;

    /**
     * @var array
     */
    private $donnees;

    /**
     * @var array
     */
    private $requiredDocuments;

    /**
     * SubscriptionResponse constructor.
     */
    public function __construct()
    {
        $this->messages = [];
        $this->donnees = [];
        $this->requiredDocuments = [];
    }

    public function getRequiredDocuments()
    {
        return $this->requiredDocuments;
    }

    /**
     * @return string
     */
    public function getIdTransaction()
    {
        return $this->idTransaction;
    }

    /**
     * @param string $idTransaction
     */
    public function setIdTransaction(string $idTransaction)
    {
        $this->idTransaction = $idTransaction;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }

    /**
     * @param string $donnees
     */
    public function setDonnees(string $donnees)
    {
        $this->donnees = $donnees;
    }

    /**
     * @return array
     */
    public function getDonnees()
    {
        return $this->donnees;
    }
}
<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class SubscriptionResponse.
 */
class SubscriptionResponse
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $idTransaction;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $orderTransaction;

    /**
     * @var array<Document>
     */
    protected $requiredDocuments;

    /**
     * SubscriptionResponse constructor.
     */
    public function __construct()
    {
        $this->requiredDocuments = [];
        $this->status = null;
    }

    /**
     * @param Document $document
     *
     * @return SubscriptionResponse
     */
    public function addRequiredDocument(Document $document): self
    {
        $this->requiredDocuments[] = $document;

        return $this;
    }

    /**
     * @param array<Document> $requiredDocuments
     *
     * @return self
     */
    public function setRequiredDocuments(array $requiredDocuments): self
    {
        $this->requiredDocuments = $requiredDocuments;

        return $this;
    }

    /**
     * @return array<Document>
     */
    public function getRequiredDocuments(): array
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
     *
     * @return self
     */
    public function setIdTransaction(string $idTransaction): self
    {
        $this->idTransaction = $idTransaction;

        return $this;
    }

    /***
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param string $status
     *
     * @return SubscriptionResponse
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getOrderTransaction(): string
    {
        return $this->orderTransaction;
    }

    /**
     * @param string $orderTransaction
     *
     * @return self
     */
    public function setOrderTransaction(string $orderTransaction): self
    {
        $this->orderTransaction = $orderTransaction;

        return $this;
    }
}

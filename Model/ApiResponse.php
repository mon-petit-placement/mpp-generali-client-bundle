<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class ApiResponse.
 */
class ApiResponse
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
     * @var array
     */
    protected $errorMessages;

    /**
     * @var string
     */
    protected $orderTransaction;

    /**
     * @var array<Document>
     */
    protected $requiredDocuments;

    /**
     * ApiResponse constructor.
     */
    public function __construct()
    {
        $this->requiredDocuments = [];
        $this->status = null;
        $this->errorMessages = [];
    }

    /**
     * @param Document $document
     *
     * @return ApiResponse
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
    public function getIdTransaction(): string
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
     * @return array
     */
    public function getErrorMessages(): ?array
    {
        return $this->errorMessages;
    }

    /**
     * @param array $errorMessages
     *
     * @return self
     */
    public function setErrorMessages(?array $errorMessages): self
    {
        $this->errorMessages = $errorMessages;

        return $this;
    }

    /**
     * @param string $status
     *
     * @return ApiResponse
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

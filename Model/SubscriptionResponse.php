<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class SubscriptionResponse.
 */
class SubscriptionResponse extends BaseResponse
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
    protected $requiredDocuments;

    /**
     * SubscriptionResponse constructor.
     */
    public function __construct()
    {
        parent::__construct();
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
    public function setIdTransaction(string $idTransaction): self
    {
        $this->idTransaction = $idTransaction;

        return $this;
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


}

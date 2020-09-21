<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Context.
 */
class Context
{
    const EXPECTED_ITEM_REFERENTIEL = 'referentiel';
    const EXPECTED_ITEM_BENEFICIARY_CLAUSE = 'clausesBenefs';
//    const EXPECTED_ITEM_REFERENTIEL = 'garantiesPrevoyance';
//    const EXPECTED_ITEM_REFERENTIEL = 'modesReglementAutorises';
//    const EXPECTED_ITEM_REFERENTIEL = 'modesGestion';
//    const EXPECTED_ITEM_REFERENTIEL = 'infoProduit';
//    const EXPECTED_ITEM_REFERENTIEL = 'fiscalites';
//    const EXPECTED_ITEM_REFERENTIEL = 'typesDuree';
//    const EXPECTED_ITEM_REFERENTIEL = 'typesDenouement';
//    const EXPECTED_ITEM_REFERENTIEL = 'combinaisonsPossiblesSouscription';
//    const EXPECTED_ITEM_REFERENTIEL = 'paramVersementInitial';
//    const EXPECTED_ITEM_REFERENTIEL = 'paramVersementLibreProgramme';
//    const EXPECTED_ITEM_REFERENTIEL = 'paramRachatPartielProgramme';

    const AVAILABLE_EXPECTED_ITEMS = [
        self::EXPECTED_ITEM_REFERENTIEL,
        self::EXPECTED_ITEM_BENEFICIARY_CLAUSE,
    ];

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $providerCode;

    /**
     * @var string
     */
    protected $subscriptionCode;

    /**
     * @var string
     */
    protected $idTransaction;

    /**
     * @var
     */
    protected $contractNumber;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var array
     */
    protected $expectedItems;

    /**
     * Context constructor.
     *
     * @param array $expectedItems
     */
    public function __construct()
    {
        $this->user = 'CLIENT';
    }

    /**
     * @return array
     */
    public function arrayToInitiate(): array
    {
        return [
          'codeApporteur' => $this->getProviderCode(),
          'numContrat' => $this->getContractNumber(),
          'codeSouscription' => $this->getSubscriptionCode(),
        ];
    }

    /**
     * @return array
     */
    public function arrayToCheck(): array
    {
        return [
            'statut' => $this->getStatus(),
            'codeApporteur' => $this->getProviderCode(),
            'numContrat' => $this->getContractNumber(),
        ];
    }

    /**
     * @return array
     */
    public function arrayToConfirm(): array
    {
        return [
            'statut' => $this->getStatus(),
            'numContrat' => $this->getContractNumber()
        ];
    }

    /**
     * @return array
     */
    public function arrayToFinalize(): array
    {
        return [
            'idTransaction' => $this->getIdTransaction()
        ];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'numContrat' => $this->contractNumber,
            'utilisateur' => $this->user,
            'idTransaction' => $this->idTransaction,
            'elementsAttendus' => $this->expectedItems,
            'codeApporteur' => $this->providerCode,
            'status' => $this->status,
            'codeSouscription' => $this->subscriptionCode,
        ];
    }

    /**
     * @param string $status
     * @return Context
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
    public function getProviderCode(): string
    {
        return $this->providerCode;
    }

    /**
     * @param string $providerCode
     * @return Context
     */
    public function setProviderCode(string $providerCode): self
    {
        $this->providerCode = $providerCode;

        return $this;
    }

    /**
     * @param string $subscriptionCode
     * @return Context
     */
    public function setSubscriptionCode(string $subscriptionCode): self
    {
        $this->subscriptionCode = $subscriptionCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionCode(): string
    {
        return $this->subscriptionCode;
    }

    /**
     * @param $expectedItems
     * @return Context
     */
    public function setExpectedItems($expectedItems): self
    {
        $this->expectedItems = $expectedItems;

        return $this;
    }

    /**
     * @return array
     */
    public function getExpectedItems(): array
    {
        return $this->expectedItems;
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
     * @return Context
     */
    public function setIdTransaction(string $idTransaction): self
    {
        $this->idTransaction = $idTransaction;

        return $this;
    }

    /**
     * @return string
     */
    public function getContractNumber(): string
    {
        return $this->contractNumber;
    }

    /**
     * @param string $contractNumber
     * @return Context
     */
    public function setContractNumber(string $contractNumber): self
    {
        $this->contractNumber = $contractNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return Context
     */
    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }
}

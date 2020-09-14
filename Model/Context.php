<?php


namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Context
 */
class Context
{
    const AVAILABLE_EXPECTED_ITEMS = [
        'clausesBenefs',
        'garantiesPrevoyance',
        'modesReglementAutorises',
        'modesGestion',
        'infoProduit',
        'fiscalites',
        'typesDuree',
        'typesDenouement',
        'combinaisonsPossiblesSouscription',
        'paramVersementInitial',
        'paramVersementLibreProgramme',
        'paramRachatPartielProgramme',
        'referentiel',
    ];


    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $providerCode;

    /**
     * @var string
     */
    private $subscriptionCode;

    /**
     * @var string
     */
    private $idTransaction;

    /**
     * @var
     */
    private $contractNumber;

    /**
     * @var string
     */
    private $user;

    /**
     * @var array
     */
    private $expectedItems;

    /**
     * Context constructor.
     * @param array $expectedItems
     */
    public function __construct(array $expectedItems = [])
    {
        $this->user = 'CLIENT';

        $items = [];
        foreach ($expectedItems as $expectedItem)
        {
            if(in_array($expectedItem, self::AVAILABLE_EXPECTED_ITEMS, true)){
                $items[]= $expectedItem;
            }
        }
        if (!empty($items)){
            $this->setExpectedItems($items);
        }
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
            'subscriptionCode' => $this->subscriptionCode,
        ];
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
     * @return string
     */
    public function getProviderCode(): string
    {
        return $this->providerCode;
    }

    /**
     * @param string $providerCode
     */
    public function setProviderCode(string $providerCode): void
    {
        $this->providerCode = $providerCode;
    }

    /**
     * @param string $subscriptionCode
     */
    public function setSubscriptionCode(string $subscriptionCode): void
    {
        $this->subscriptionCode = $subscriptionCode;
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
     */
    public function setExpectedItems($expectedItems): void
    {
        $this->expectedItems = $expectedItems;
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
     */
    public function setIdTransaction(string $idTransaction): void
    {
        $this->idTransaction = $idTransaction;
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
     */
    public function setContractNumber(string $contractNumber): void
    {
        $this->contractNumber = $contractNumber;
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
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }
}
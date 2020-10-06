<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class FreePayment.
 */
class FreePayment
{
    /**
     * @var CustomerFolder
     */
    protected $customerFolder;

    /**
     * @var array<Repartition>
     */
    protected $repartitions;

    /**
     * @var Settlement
     */
    protected $settlement;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $externalOperationNumber;

    /**
     * @var Subscriber
     */
    protected $subscriber;

    /**
     * @return CustomerFolder
     */
    public function getCustomerFolder(): CustomerFolder
    {
        return $this->customerFolder;
    }

    /**
     * @param CustomerFolder $customerFolder
     *
     * @return self
     */
    public function setCustomerFolder(CustomerFolder $customerFolder): self
    {
        $this->customerFolder = $customerFolder;

        return $this;
    }

    /**
     * @return array
     */
    public function getRepartitions(): array
    {
        return $this->repartitions;
    }

    /**
     * @param array $repartitions
     *
     * @return self
     */
    public function setRepartitions(array $repartitions): self
    {
        $this->repartitions = $repartitions;

        return $this;
    }

    /**
     * @return Settlement
     */
    public function getSettlement(): Settlement
    {
        return $this->settlement;
    }

    /**
     * @param Settlement $settlement
     *
     * @return self
     */
    public function setSettlement(Settlement $settlement): self
    {
        $this->settlement = $settlement;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return self
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getExternalOperationNumber(): string
    {
        return $this->externalOperationNumber;
    }

    /**
     * @param string $externalOperationNumber
     *
     * @return self
     */
    public function setExternalOperationNumber(string $externalOperationNumber): self
    {
        $this->externalOperationNumber = $externalOperationNumber;

        return $this;
    }

    /**
     * @return array
     */
    public function repartitionsToArray(): array
    {
        $repartitions = [];
        foreach ($this->repartitions as $repartition) {
            $repartitions[] = $repartition->toArray();
        }

        return $repartitions;
    }

    /**
     * @return Subscriber
     */
    public function getSubscriber(): Subscriber
    {
        return $this->subscriber;
    }

    /**
     * @param Subscriber $subscriber
     *
     * @return self
     */
    public function setSubscriber(Subscriber $subscriber): self
    {
        $this->subscriber = $subscriber;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dossierClient' => [
                'contractant' => [
                    'nom' => $this->getSubscriber()->getLastName(),
                    'prenom' => $this->getSubscriber()->getFirstName(),
                    'residenceFiscale' => $this->getSubscriber()->getTaxCountry(),
                    'nationalite' => $this->getSubscriber()->getBirthCountry(),
                    'complement' => [
                        'situationFamiliale' => $this->getSubscriber()->getFamilialSituation(),
                        'situationProfessionnelle' => $this->getSubscriber()->getProfessionalSituation(),
                        'regimeMatrimonial' => $this->getSubscriber()->getMatrimonialRegime(),
                        'csp' => $this->getSubscriber()->getCspCode(),
                        'profession' => $this->getSubscriber()->getProfession(),
                        'nomEmployeur' => $this->getSubscriber()->getEmployerName(),
                    ],
                    'ppe' => [
                        'etatPPE' => [
                            'indicateur' => $this->getSubscriber()->getPpeStateIndicator(),
                        ],
                        'etatPPEFamille' => [
                            'indicateur' => $this->getSubscriber()->getPpeFamilyStateIndicator(),
                        ],
                    ],
                    'capaciteJuridique' => $this->getSubscriber()->getLegalCapacity(),
                ],
                'estimationPatrimoineFoyer' => [
                    'code' => $this->getCustomerFolder()->getAssetCode(),
                    'montant' => $this->getCustomerFolder()->getAssetAmount(),
                ],
                'objectifsVersement' => $this->getCustomerFolder()->payoutTargetsToArray(),
                'originesPatrimoine' => $this->getCustomerFolder()->assetsOriginToArray(),
                'repartitionPatrimoine' => $this->getCustomerFolder()->assetsRepartitionToArray(),
                'revenusAnnuelsNetFoyer' => [
                    'code' => $this->getCustomerFolder()->getIncomeCode(),
                    'montant' => $this->getCustomerFolder()->getIncomeAmount(),
                ],
                'originePaiement' => [
                    'moyenPaiementFrancais' => $this->getCustomerFolder()->getFrenchOriginPayment(),
                    'paiementParTiersPayeur' => $this->getCustomerFolder()->getThirdPartyPayment(),
                ],
            ],
            'repartition' => $this->repartitionsToArray(),
            'reglement' => $this->getSettlement()->toArray(),
            'amount' => $this->getAmount(),
            'numeroOperationExterne' => $this->getExternalOperationNumber(),
        ];
    }
}

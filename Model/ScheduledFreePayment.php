<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class ScheduledFreePayment.
 */
class ScheduledFreePayment
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $periodicty;

    /**
     * @var Settlement
     */
    protected $settlement;

    /**
     * @var array<Repartition>
     */
    protected $repartitions;

    /**
     * @var CustomerFolder
     */
    protected $customerFolder;

    /**
     * @var Subscriber
     */
    protected $subscriber;

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
     * @return string
     */
    public function getPeriodicity(): string
    {
        return $this->periodicity;
    }

    /**
     * @param string $periodicity
     *
     * @return self
     */
    public function setPeriodicity(string $periodicity): self
    {
        $this->periodicity = $periodicity;

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
            'versement' => [
                'montant' => $this->getAmount(),
                'periodicite' => $this->getPeriodicity(),
            ],
        ];
    }

    /**
     * @return array
     */
    public function toEditArray(): array
    {
        return [
            'versement' => [
                'montant' => $this->getAmount(),
                'periodicite' => $this->getPeriodicity(),
            ],
            'repartition' => $this->repartitionsToArray(),
        ];
    }
}

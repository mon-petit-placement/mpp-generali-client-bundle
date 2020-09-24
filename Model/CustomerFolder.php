<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class CustomerFolder.
 */
class CustomerFolder
{
    /**
     * @var float
     */
    protected $incomeAmount;

    /**
     * @var string
     */
    protected $incomeCode;

    /**
     * @var float
     */
    protected $assetAmount;

    /**
     * @var string
     */
    protected $assetCode;

    /**
     * @var bool
     */
    protected $frenchOriginPayment;

    /**
     * @var bool
     */
    protected $thirdPartyPayment;

    /**
     * @var array
     */
    protected $payoutTargets;

    /**
     * @var array
     */
    protected $assetsOrigin;

    /**
     * @var array
     */
    protected $assetsRepartition;

    /**
     * @return array
     */
    public function payoutTargetsToArray(): array
    {
        $payoutTargets = [];
        foreach ($this->getPayoutTarget() as $payoutTarget) {
            $payoutTargets[] = $payoutTarget->toArray();
        }

        return $payoutTargets;
    }

    /**
     * @return array
     */
    public function assetsOriginToArray(): array
    {
        $assetsOrigins = [];
        foreach ($this->getAssetsOrigin() as $assetsOrigin) {
            $assetsOrigins[] = $assetsOrigin->toArray();
        }

        return $assetsOrigins;
    }

    /**
     * @return array
     */
    public function assetsRepartitionToArray(): array
    {
        $assetsRepartitions = [];
        foreach ($this->getAssetsRepartition() as $assetRepartition) {
            $assetsRepartitions[] = $assetRepartition->toArray();
        }

        return $assetsRepartitions;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return  [
            'situationPatrimoniale' => [
                'codeTrancheRevenu' => $this->getIncomeCode(),
                'codeTranchePatrimoine' => $this->getAssetCode(),
                'originePatrimoniale' => $this->assetsOriginToArray(),
                'repartitionPatrimoniale' => $this->assetsRepartitionToArray(),
                'montantRevenu' => $this->getIncomeAmount(),
                'montantPatrimoine' => $this->getAssetAmount(),
            ],
            'objectifsVersement' => $this->payoutTargetsToArray(),
            'originePaiement' => [
                'moyenPaiementFrancais' => $this->getFrenchOriginPayment(),
                'paiementParTiersPayeur' => $this->getThirdPartyPayment(),
            ],
        ];
    }

    /**
     * @return float
     */
    public function getIncomeAmount(): float
    {
        return $this->incomeAmount;
    }

    /**
     * @param string $incomeAmount
     *
     * @return self
     */
    public function setIncomeAmount(string $incomeAmount): self
    {
        $this->incomeAmount = $incomeAmount;

        return $this;
    }

    /**
     * @param string $incomeCode
     *
     * @return self
     */
    public function setIncomeCode(string $incomeCode): self
    {
        $this->incomeCode = $incomeCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncomeCode(): string
    {
        return $this->incomeCode;
    }

    /**
     * @return float
     */
    public function getAssetAmount(): float
    {
        return $this->assetAmount;
    }

    /**
     * @param string $heritageAmount
     *
     * @return self
     */
    public function setAssetAmount(string $assetAmount): self
    {
        $this->assetAmount = $assetAmount;

        return $this;
    }

    /**
     * @param string $assetCode
     *
     * @return CustomerFolder
     */
    public function setAssetCode(string $assetCode): self
    {
        $this->assetCode = $assetCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getAssetCode(): string
    {
        return $this->assetCode;
    }

    /**
     * @return bool
     */
    public function getFrenchOriginPayment(): bool
    {
        return $this->frenchOriginPayment;
    }

    /**
     * @param bool $frenchOriginPayment
     *
     * @return self
     */
    public function setFrenchOriginPayment(bool $frenchOriginPayment): self
    {
        $this->frenchOriginPayment = $frenchOriginPayment;

        return $this;
    }

    /**
     * @return bool
     */
    public function getThirdPartyPayment(): bool
    {
        return $this->thirdPartyPayment;
    }

    /**
     * @param bool $thirdPartyPayment
     *
     * @return self
     */
    public function setThirdPartyPayment(bool $thirdPartyPayment): self
    {
        $this->thirdPartyPayment = $thirdPartyPayment;

        return $this;
    }

    /**
     * @return array
     */
    public function getPayoutTarget(): array
    {
        return $this->payoutTargets;
    }

    /**
     * @param array $payoutTargets
     *
     * @return self
     */
    public function setPayoutTargets(array $payoutTargets): self
    {
        $this->payoutTargets = $payoutTargets;

        return $this;
    }

    /**
     * @return array
     */
    public function getAssetsRepartition(): array
    {
        return $this->assetsRepartition;
    }

    /**
     * @param array $assetsRepartition
     *
     * @return self
     */
    public function setAssetsRepartition(array $assetsRepartition): self
    {
        $this->assetsRepartition = $assetsRepartition;

        return $this;
    }

    /**
     * @return array
     */
    public function getAssetsOrigin(): array
    {
        return $this->assetsOrigin;
    }

    /**
     * @param array $assetsorigin
     *
     * @return self
     */
    public function setAssetsOrigin(array $assetsorigin): self
    {
        $this->assetsOrigin = $assetsorigin;

        return $this;
    }
}

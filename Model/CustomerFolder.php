<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
     * @return float
     */
    public function getIncomeAmount(): float
    {
        return $this->incomeAmount;
    }

    /**
     * @param string $incomeAmount
     *
     * @return CustomerFolder
     */
    public function setIncomeAmount(string $incomeAmount): self
    {
        $this->incomeAmount = $incomeAmount;
    }

    /**
     * @param string $incomeCode
     *
     * @return CustomerFolder
     */
    public function setIncomeCode(string $incomeCode): self
    {
        $this->incomeCode = $incomeCode;
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
     * @return CustomerFolder
     */
    public function setAssetAmount(string $assetAmount): self
    {
        $this->assetAmount = $assetAmount;
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
     * @return CustomerFolder
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
     * @param string $thirdPartyPayment
     *
     * @return CustomerFolder
     */
    public function setThirdPartyPayment(string $thirdPartyPayment): self
    {
        $this->thirdPartyPayment = $thirdPartyPayment;
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
     * @return CustomerFolder
     */
    public function setPayoutTargets(array $payoutTargets): self
    {
        $this->payoutTargets = $payoutTargets;
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
     * @return CustomerFolder
     */
    public function setAssetsRepartition(array $assetsRepartition): self
    {
        $this->assetsRepartition = $assetsRepartition;
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
     * @return CustomerFolder
     */
    public function setAssetsOrigin(array $assetsorigin): self
    {
        $this->assetsOrigin = $assetsorigin;
    }
}

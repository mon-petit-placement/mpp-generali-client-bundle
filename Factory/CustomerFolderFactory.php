<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\AssetsOrigin;
use Mpp\GeneraliClientBundle\Model\AssetsRepartition;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\CustomerFolder;
use Mpp\GeneraliClientBundle\Model\PayoutTarget;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomerFolderFactory
 */
class CustomerFolderFactory extends AbstractFactory
{
    /**
     * @var PayoutTargetFactory
     */
    private $payoutTargetFactory;

    /**
     * @var AssetsOriginFactory
     */
    private $assetsOriginFactory;

    /**
     * @var AssetsRepartitionFactory
     */
    private $assetRepartitionFactory;

    /**
     * CustomerFolderFactory constructor.
     * @param GeneraliHttpClientInterface $httpClient
     * @param PayoutTargetFactory $payoutTargetFactory
     * @param AssetsOriginFactory $assetOriginFactory
     * @param AssetsRepartitionFactory $assetRepartitionFactory
     */
    public function __construct(GeneraliHttpClientInterface $httpClient, PayoutTargetFactory $payoutTargetFactory, AssetsOriginFactory $assetsOriginFactory, AssetsRepartitionFactory $assetRepartitionFactory)
    {
        parent::__construct($httpClient);
        $this->payoutTargetFactory = $payoutTargetFactory;
        $this->assetsOriginFactory = $assetsOriginFactory;
        $this->assetRepartitionFactory = $assetRepartitionFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver, string $contractNumber): void
    {
        $resolver
            ->setRequired('incomeAmount')->setAllowedTypes('incomeAmount', ['float'])
            ->setRequired('assetAmount')->setAllowedTypes('assetAmount', ['float'])
            ->setDefault('frenchOriginPayment', true)->setAllowedTypes('frenchOriginPayment', ['bool'])
            ->setDefault('thirdPartyPayment', false)->setAllowedTypes('thirdPartyPayment', ['bool'])
            ->setRequired('payoutTargets')->setAllowedTypes('payoutTargets', ['array'])->setNormalizer('payoutTargets', function (Options $options, $values, $contractNumber) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->payoutTargetFactory->create($value, $contractNumber);
                }

                return $resolvedValues;
            })
            ->setDefined('assetsOrigin')->setAllowedTypes('assetsOrigin', ['array'])->setNormalizer('assetsOrigin', function (Options $options, $values, $contractNumber) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->assetOriginFactory->create($value, $contractNumber);
                }

                return $resolvedValues;
            })
            ->setDefined('assetsRepartition')->setAllowedTypes('assetsRepartition', ['array'])->setNormalizer('assetsRepartition', function (Options $options, $values, $contractNumber) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->assetRepartitionFactory->create($value, $contractNumber);
                }

                return $resolvedValues;
            })
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData, string $contractNumber)
    {
        $incomeCode = $this->guessReferentialCode(ReferentialHandler::REFERENTIAL_INCOME_SLICES, $contractNumber, $resolvedData['incomeAmount']);
        $assetCode = $this->guessReferentialCode(ReferentialHandler::REFERENTIAL_ASSET_SLICES, $contractNumber, $resolvedData['assetAmount']);

        return (new CustomerFolder())
            ->setAssetAmount($resolvedData['assetAmount'])
            ->setAssetCode($assetCode)
            ->setIncomeAmount($resolvedData['incomeAmount'])
            ->setIncomeCode($incomeCode)
            ->setFrenchOriginPayment($resolvedData['frenchOriginPayment'])
            ->setThirdPartyPayment($resolvedData['thirdPartyPayment'])
            ->setPayoutTargets($resolvedData['payoutTargets'])
            ->setAssetsOrigin($resolvedData['assetsOrigin'])
            ->setAssetsRepartition($resolvedData['assetsRepartition'])
        ;
    }
}
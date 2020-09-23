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
    private $assetsRepartitionFactory;

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
        $this->assetsRepartitionFactory = $assetRepartitionFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('incomeAmount')->setAllowedTypes('incomeAmount', ['float'])
            ->setRequired('assetAmount')->setAllowedTypes('assetAmount', ['float'])
            ->setDefault('frenchOriginPayment', true)->setAllowedTypes('frenchOriginPayment', ['bool'])
            ->setDefault('thirdPartyPayment', false)->setAllowedTypes('thirdPartyPayment', ['bool'])
            ->setRequired('payoutTargets')->setAllowedTypes('payoutTargets', ['array'])->setNormalizer('payoutTargets', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->payoutTargetFactory->create($value);
                }

                return $resolvedValues;
            })
            ->setDefined('assetsOrigin')->setAllowedTypes('assetsOrigin', ['array'])->setNormalizer('assetsOrigin', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->assetsOriginFactory->create($value);
                }

                return $resolvedValues;
            })
            ->setDefined('assetsRepartition')->setAllowedTypes('assetsRepartition', ['array'])->setNormalizer('assetsRepartition', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->assetsRepartitionFactory->create($value);
                }

                return $resolvedValues;
            })
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData)
    {
        $incomeCode = $this->guessReferentialCode(ReferentialHandler::REFERENTIAL_INCOME_SLICES, $resolvedData['incomeAmount']);
        $assetCode = $this->guessReferentialCode(ReferentialHandler::REFERENTIAL_ASSET_SLICES, $resolvedData['assetAmount']);

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
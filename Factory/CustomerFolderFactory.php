<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\AssetOrigin;
use Mpp\GeneraliClientBundle\Model\AssetsRepartition;
use Mpp\GeneraliClientBundle\Model\CustomerFolder;
use Mpp\GeneraliClientBundle\Model\PayoutTarget;

/**
 * Class CustomerFolderFactory
 */
class CustomerFolderFactory
{
    /**
     * @var GeneraliHttpClientInterface
     */
    private $httpClient;

    /**
     * @param GeneraliHttpClientInterface $httpClient
     */
    public function __construct(GeneraliHttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('incomeAmount', null)->setAllowedTypes('incomeAmount', ['float', 'null'])
            ->setDefault('incomeCode', null)->setAllowedTypes('incomeCode', ['string', 'null'])
            ->setDefault('assetAmount', null)->setAllowedTypes('assetAmount', ['float', 'null'])
            ->setDefault('assetCode', null)->setAllowedTypes('assetCode', ['string', 'null'])
            ->setDefault('frenchOriginPayment', null)->setAllowedTypes('frenchOriginPayment', ['bool', 'null'])
            ->setDefault('thirdPartyPayment', null)->setAllowedTypes('thirdPartyPayment', ['bool', 'null'])
            ->setDefault('payoutTargets', [])->setAllowedTypes('payoutTargets', ['array', 'null'])->setNormalizer('payoutTargets', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = PayoutTargetFactory::create($value);
                }

                return $resolvedValues;
            })
            ->setDefault('assetsOrigin', [])->setAllowedTypes('assetsOrigin', ['array', 'null'])->setNormalizer('assetsOrigin', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = AssetOriginFactory::create($value);
                }

                return $resolvedValues;
            })
            ->setDefault('assetsRepartition', [])->setAllowedTypes('assetsRepartition', ['array', 'null'])->setNormalizer('assetsRepartition', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = AssetsRepartitionFactory::create($value);
                }

                return $resolvedValues;
            })
        ;
    }

    /**
     * @param array $data
     *
     * @return CustomerFolder
     */
    public function create(array $data)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resovledValues = $resolver->resolve($data);

        return (new CustomerFolder())
            ->setAssetAmount($resovledValues['assetAmount'])
            ->setAssetCode($resovledValues['assetCode'])
            ->setIncomeAmount($resovledValues['incomeAmount'])
            ->setIncomeCode($resovledValues['incomeCode'])
            ->setFrenchOriginPayment($resovledValues['frenchOriginPayment'])
            ->setThirdPartyPayment($resovledValues['thirdPartyPayment'])
            ->setPayoutTargets($resovledValues['payoutTargets'])
            ->setAssetsOrigin($resovledValues['assetsOrigin'])
            ->setAssetsRepartition($resovledValues['assetsRepartition'])
            ;
    }
}
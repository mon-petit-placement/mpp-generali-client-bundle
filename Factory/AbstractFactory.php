<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SettlementFactory.
 */
abstract class AbstractFactory implements FactoryInterface
{
    /**
     * @var ReferentialHandler
     */
    private $referentialHandler;

    /**
     * AbstractFactory constructor.
     *
     * @param ReferentialHandler $referentialHandler
     */
    public function __construct(ReferentialHandler $referentialHandler)
    {
        $this->referentialHandler = $referentialHandler;
    }

    /**
     * @return ReferentialHandler
     */
    public function getReferentialHandler(): ReferentialHandler
    {
        return $this->referentialHandler;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $parameters)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);
        $resolvedData = $resolver->resolve($parameters);

        return $this->doCreate($resolvedData);
    }

    /**
     * @param OptionsResolver $resolver
     */
    abstract public function configureData(OptionsResolver $resolver): void;

    /**
     * @param array $resolvedData
     *
     * @return mixed
     */
    abstract public function doCreate(array $resolvedData);
}

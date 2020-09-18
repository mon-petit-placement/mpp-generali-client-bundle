<?php


namespace Mpp\GeneraliClientBundle\Factory;


class FactoryRegistry
{
    /**
     * @var array<FactoryInterface>
     */
    private $factories;

    /**
     * @param string $alias
     * @return FactoryInterface
     */
    public function getFactory(string $alias): FactoryInterface
    {

    }

    /**
     * @param string $alias
     * @return bool
     */
    public function hasFactory(string $alias): bool
    {

    }

    /**
     * @param string $alias
     * @param FactoryInterface $factory
     * @return self
     */
    public function setFactory(string $alias, FactoryInterface $factory): self
    {

    }
}
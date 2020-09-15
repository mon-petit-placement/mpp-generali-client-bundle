<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InitialPayment
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var array
     */
    protected $repartition;

    /**
     * @param OptionsResolver $resolver
     */
    public static function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('amount', null)->setAllowedTypes('amount', ['float', 'null'])
            ->setDefault('repartition', [])->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values) {
                $resolvedValues = [];

                foreach ($values as $value) {
                    $resolvedValues[] = Repartition::createFromArray($value);
                }

                return $resolvedValues;
            })
        ;
    }

    public static function createFromArray(array $data)
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);

        $resolvedValues = $resolver->resolve($data);

        return (new self())
            ->setAmount($resolvedValues['amount'])
            ->setRepartition($resolvedValues['repartition'])
            ;
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
     * @return $this
     */
    public function setAmount(float $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return array
     */
    public function getRepartition(): array
    {
        return $this->repartition;
    }

    /**
     * @param string $repartition
     *
     * @return InitialPayment
     */
    public function setRepartition(string $repartition): self
    {
        $this->repartition = $repartition;
    }
}

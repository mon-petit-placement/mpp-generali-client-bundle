<?php


namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Repartition
 */
class Repartition
{
    /**
     * @var string
     */
    protected $fundsCode;

    /**
     * @var string
     */
    protected $amount;

    /**
     * @param OptionsResolver $resolver
     */
    public static function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('amount', null)->setAllowedTypes('amount', ['string', 'null'])
            ->setDefault('fundsCode', null)->setAllowedTypes('fundsCode', ['string', 'null'])
        ;


    }


    /**
     * @param array $data
     * @return mixed
     */
    public static function createFromArray(array $data)
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);
        $resolvedData = $resolver->resolve($data);

        return (new self())
            ->setAmount($resolvedData['amount'])
            ->setFundsCode($resolvedData['fundsCode'])
        ;
    }

    /**
     * @return string
     */
    public function getFundsCode(): string
    {
        return $this->fundsCode;
    }

    /**
     * @param string $fundsCode
     * @return Repartition
     */
    public function setFundsCode(string $fundsCode): self
    {
        $this->fundsCode = $fundsCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Repartition
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}
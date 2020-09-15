<?php


namespace Mpp\GeneraliClientBundle\Model;


use Symfony\Component\OptionsResolver\OptionsResolver;

class FundsOrigin
{
    /**
     * @var string
     */
    protected $codeOrigin;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $precision;

    /**
     * @param OptionsResolver $resolver
     */
    public static function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('codeOrigin', null)->setAllowedTypes('codeOrigin', ['string', 'null'])
            ->setDefault('amount', null)->setAllowedTypes('amount', ['float', 'null'])
            ->setDefault('date', null)->setAllowedTypes('date', ['string', 'null'])
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string', 'null'])
        ;
    }

    /**
     * @param array $data
     * @return FundsOrigin
     */
    public static function createFromArray(array $data)
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);

        $resovedValues = $resolver->resolve($data);

        return (new self())
            ->setPrecision($resovedValues['precision'])
            ->setAmount($resovedValues['amount'])
            ->setdate($resovedValues['date'])
            ->setCodeOrigin($resovedValues['codeOrigin'])
            ;
    }

    /**
     * @return string
     */
    public function getCodeOrigin(): string
    {
        return $this->codeOrigin;
    }

    /**
     * @param string $codeOrigin
     * @return FundsOrigin
     */
    public function setCodeOrigin(string $codeOrigin): self
    {
        $this->codeOrigin = $codeOrigin;
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
     * @return FundsOrigin
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param string $precision
     * @return FundsOrigin
     */
    public function setPrecision(string $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrecision(): string
    {
        return $this->precision;
    }
}
<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FundsOrigin
 */
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
     * @var \DateTime
     */
    protected $date;

    /**
     * @var string
     */
    protected $precision;

    /**
     * @var string
     */
    protected $detail;

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [
            'code' => $this->getCodeOrigin(),
            'montant' => $this->getAmount(),
            'precision' => $this->getPrecision(),
            'date' => $this->getDate()->format('Y-m-d')
        ];
        if(null !== $this->getDetail()){
            $result['codesDetail'][] = $this->getDetail();
        }

        return $result;
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
     *
     * @return FundsOrigin
     */
    public function setCodeOrigin(string $codeOrigin): self
    {
        $this->codeOrigin = $codeOrigin;

        return $this;
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
     * @return FundsOrigin
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     *
     * @return $this
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param string $precision
     *
     * @return self
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

    /**
     * @param string $detail
     * @return self
     */
    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * @return string
     */
    public function getDetail(): ?string
    {
        return $this->detail;
    }
}

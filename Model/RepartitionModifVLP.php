<?php

namespace Mpp\GeneraliClientBundle\Model;

class RepartitionModifVLP
{
    /**
     * @var Repartition[]|null
     */
    private $fondsInvestis;

    /**
     * @return Repartition[]|null
     */
    public function getFondsInvestis(): ?array
    {
        return $this->fondsInvestis;
    }

    /**
     * @param Repartition[]|null $fondsInvestis
     */
    public function setFondsInvestis(?array $fondsInvestis): void
    {
        $this->fondsInvestis = $fondsInvestis;
    }
}

<?php

namespace Mpp\GeneraliClientBundle\Model;

class FondsInvestis
{
    /**
     * @var FondsInvesti
     */
    private $fondsInvesti;

    /**
     * @return FondsInvesti
     */
    public function getFondsInvesti(): FondsInvesti
    {
        return $this->fondsInvesti;
    }

    /**
     * @param FondsInvesti $fondsInvesti
     *
     * @return FondsInvestis
     */
    public function setFondsInvesti(FondsInvesti $fondsInvesti): FondsInvestis
    {
        $this->fondsInvesti = $fondsInvesti;

        return $this;
    }
}

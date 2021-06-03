<?php

namespace Mpp\GeneraliClientBundle\Model;

class FondsDesinvestis
{
    /**
     * @var FondsDesinvesti
     */
    private $fondsDesinvesti;

    /**
     * @return FondsDesinvesti
     */
    public function getFondsDesinvesti(): FondsDesinvesti
    {
        return $this->fondsDesinvesti;
    }

    /**
     * @param FondsDesinvesti $fondsDesinvesti
     *
     * @return FondsDesinvestis
     */
    public function setFondsDesinvesti(FondsDesinvesti $fondsDesinvesti): FondsDesinvestis
    {
        $this->fondsDesinvesti = $fondsDesinvesti;

        return $this;
    }
}

<?php

namespace Mpp\GeneraliClientBundle\Model;

class SituationPatrimoniale
{
    /**
     * @var string
     */
    private $codeTrancheRevenu;

    /**
     * @var float
     */
    private $montantRevenu;

    /**
     * @var string
     */
    private $codeTranchePatrimoine;

    /**
     * @var float
     */
    private $montantPatrimoine;

    /**
     * @var array<OriginePatrimoniale>
     */
    private $originePatrimoniale;

    /**
     * @var array<RepartitionPatrimoniale>
     */
    private $repartitionPatrimoniale;
}

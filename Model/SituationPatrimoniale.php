<?php

namespace Mpp\GeneraliClientBundle\Model;

class SituationPatrimoniale
{
    /**
     * @var string|null
     */
    private $codeTrancheRevenu;

    /**
     * @var float|null
     */
    private $montantRevenu;

    /**
     * @var string|null
     */
    private $codeTranchePatrimoine;

    /**
     * @var float|null
     */
    private $montantPatrimoine;

    /**
     * @var array<OriginePatrimoniale>|null
     */
    private $originePatrimoniale;

    /**
     * @var array<RepartitionPatrimoniale>|null
     */
    private $repartitionPatrimoniale;
}

<?php

namespace Mpp\GeneraliClientBundle\Model;

class DossierClient
{
    /**
     * @var SituationPatrimoniale
     */
    private $situationPatrimoniale;

    /**
     * @var array<ObjectifVersement>
     */
    private $objectifsVersement;

    /**
     * @var OriginePaiement
     */
    private $originePaiement;
}

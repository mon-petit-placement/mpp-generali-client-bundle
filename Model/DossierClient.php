<?php

namespace Mpp\GeneraliClientBundle\Model;

class DossierClient
{
    /**
     * @var SituationPatrimoniale|null
     */
    private $situationPatrimoniale;

    /**
     * @var array<ObjectifVersement>|null
     */
    private $objectifsVersement;

    /**
     * @var OriginePaiement|null
     */
    private $originePaiement;
}

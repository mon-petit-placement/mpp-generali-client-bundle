<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationVersementLibreProgramme
{
    /**
     * @var InfosContrat|null
     */
    private $infosContrat;

    /**
     * @var ParametrageVersementLibreProgramme|null
     */
    private $parametrageVersementLibreProgramme;

    /**
     * @var array<FondsInvestissable>|null
     */
    private $fondsInvestissables;

    /**
     * @var Referentiel|null
     */
    private $referentiel;

    /**
     * @var array<IbanVirement>|null
     */
    private $comptesBancairesPrelevement;

    /**
     * @var ConnaissanceClient|null
     */
    private $connaissanceClient;

    /**
     * @var EpargneAtteinte|null
     */
    private $epargneAtteinte;

    /**
     * @var InfoVersement|null
     */
    private $infoVersement;
}

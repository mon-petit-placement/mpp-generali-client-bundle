<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationVersementLibreProgramme
{
    /**
     * @var InfosContrat
     */
    private $infosContrat;

    /**
     * @var ParametrageVersementLibreProgramme
     */
    private $parametrageVersementLibreProgramme;

    /**
     * @var array<FondsInvestissable>
     */
    private $fondsInvestissables;

    /**
     * @var Referentiel
     */
    private $referentiel;

    /**
     * @var array<IbanVirement>
     */
    private $comptesBancairesPrelevement;

    /**
     * @var ConnaissanceClient
     */
    private $connaissanceClient;

    /**
     * @var EpargneAtteinte
     */
    private $epargneAtteinte;

    /**
     * @var InfoVersement
     */
    private $infoVersement;
}

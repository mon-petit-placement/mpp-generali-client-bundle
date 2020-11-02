<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationSouscription
{
    const MODE_REGLEMENT_AUTHORISE_PRELEVEMENT = 'PRELEVEMENT';
    const MODE_REGLEMENT_AUTHORISE_VIREMENT = 'VIREMENT';
    const MODE_REGLEMENT_AUTHORISE_CHEQUE = 'CHEQUE';
    /**
     * @var array<ClausesBenef>|null
     */
    private $clausesBenefs;

    /**
     * @var array<GarantiePrevoyance>|null
     */
    private $garantiesPrevoyance;

    /**
     * @var string|null
     */
    private $modesReglementAutorises;

    /**
     * @var InfoProduit|null
     */
    private $infoProduit;

    /**
     * @var array<SouscriptionFiscalite>|null
     */
    private $fiscalites;

    /**
     * @var array<TypeDuree>|null
     */
    private $typesDuree;

    /**
     * @var array<TypeDenouement>|null
     */
    private $typesDenouement;

    /**
     * @var array<CombinaisonPossibleSouscription>|null
     */
    private $combinaisonsPossiblesSouscription;

    /**
     * @var array<ModeGestion>|null
     */
    private $modesGestion;

    /**
     * @var ParamVersementInitial|null
     */
    private $paramVersementInitial;

    /**
     * @var ParamVersementLibreProgramme|null
     */
    private $paramVersementLibreProgramme;

    /**
     * @var Referentiel|null
     */
    private $referentiel;
}

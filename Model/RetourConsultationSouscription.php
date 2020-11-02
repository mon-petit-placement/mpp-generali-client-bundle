<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationSouscription
{
    const MODE_REGLEMENT_AUTHORISE_PRELEVEMENT = 'PRELEVEMENT';
    const MODE_REGLEMENT_AUTHORISE_VIREMENT = 'VIREMENT';
    const MODE_REGLEMENT_AUTHORISE_CHEQUE = 'CHEQUE';
    /**
     * @var array<ClausesBenef>
     */
    private $clausesBenefs;

    /**
     * @var array<GarantiePrevoyance>
     */
    private $garantiesPrevoyance;

    /**
     * @var string
     */
    private $modesReglementAutorises;

    /**
     * @var InfoProduit
     */
    private $infoProduit;

    /**
     * @var array<SouscriptionFiscalite>
     */
    private $fiscalites;

    /**
     * @var array<TypeDuree>
     */
    private $typesDuree;

    /**
     * @var array<TypeDenouement>
     */
    private $typesDenouement;

    /**
     * @var array<CombinaisonPossibleSouscription>
     */
    private $combinaisonsPossiblesSouscription;

    /**
     * @var array<ModeGestion>
     */
    private $modesGestion;

    /**
     * @var ParamVersementInitial
     */
    private $paramVersementInitial;

    /**
     * @var ParamVersementLibreProgramme
     */
    private $paramVersementLibreProgramme;

    /**
     * @var Referentiel
     */
    private $referentiel;
}

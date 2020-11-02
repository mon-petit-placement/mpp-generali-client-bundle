<?php

namespace Mpp\GeneraliClientBundle\Model;

class Souscripteur
{
    /**
     * @var Noms
     */
    private $noms;

    /**
     * @var ResidenceFiscale
     */
    private $residenceFiscale;

    /**
     * @var string
     */
    private $nationalite;

    /**
     * @var SouscripteurComplement
     */
    private $complement;

    /**
     * @var Ppe
     */
    private $ppe;

    /**
     * @var string
     */
    private $capaciteJuridique;

    /**
     * @var SouscripteurNaissance
     */
    private $naissance;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var PieceIdentite
     */
    private $pieceIdentite;

    /**
     * @var PieceIdentite
     */
    private $secondePieceIdentite;
}

<?php

namespace Mpp\GeneraliClientBundle\Model;

class Souscripteur
{
    /**
     * @var Noms|null
     */
    private $noms;

    /**
     * @var ResidenceFiscale|null
     */
    private $residenceFiscale;

    /**
     * @var string|null
     */
    private $nationalite;

    /**
     * @var SouscripteurComplement|null
     */
    private $complement;

    /**
     * @var Ppe|null
     */
    private $ppe;

    /**
     * @var string|null
     */
    private $capaciteJuridique;

    /**
     * @var SouscripteurNaissance|null
     */
    private $naissance;

    /**
     * @var Contact|null
     */
    private $contact;

    /**
     * @var PieceIdentite|null
     */
    private $pieceIdentite;

    /**
     * @var PieceIdentite|null
     */
    private $secondePieceIdentite;
}

<?php

namespace Mpp\GeneraliClientBundle\Model;

class Contexte
{
    const UTILISATEUR_CLIENT = 'CLIENT';
    const UTILISATEUR_APPORTEUR = 'APPORTEUR';

    /**
     * @var string
     */
    private $statut;

    /**
     * @var string
     */
    private $codeApporteur;

    /**
     * @var string
     */
    private $codeSouscription;

    /**
     * @var string
     */
    private $numContrat;

    /**
     * @var array
     */
    private $elementsAttendus;

    /**
     * @var string
     */
    private $adresseEmailCopie;

    /**
     * @var string
     */
    private $idTransaction;

    /**
     * @var string
     */
    private $utilisateur;
}

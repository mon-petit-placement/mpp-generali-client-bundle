<?php

namespace Mpp\GeneraliClientBundle\Model;

class Contexte
{
    const UTILISATEUR_CLIENT = 'CLIENT';
    const UTILISATEUR_APPORTEUR = 'APPORTEUR';

    /**
     * @var string|null
     */
    private $statut;

    /**
     * @var string|null
     */
    private $codeApporteur;

    /**
     * @var string|null
     */
    private $codeSouscription;

    /**
     * @var string|null
     */
    private $numContrat;

    /**
     * @var array|null
     */
    private $elementsAttendus;

    /**
     * @var string|null
     */
    private $adresseEmailCopie;

    /**
     * @var string|null
     */
    private $idTransaction;

    /**
     * @var string|null
     */
    private $utilisateur;
}

<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\RetourConsultationSouscription;
use Mpp\GeneraliClientBundle\Model\Souscription;
use Symfony\Component\HttpFoundation\File\File;

class GeneraliSubscriptionClientTest extends GeneraliClientTest
{
    private $client;
    private $subscription;
    private File $dummyDocument;

    public function setUp(): void
    {
        $this->client = self::$registry->getSubscription();
        $this->subscription = self::$factory->createFromArray(Souscription::class, [
            'referencesExternes' => [
                'refExterne' => 'ERFDV45X',
            ],
            'duree' => [
                'typeDuree' => 'VIE_ENTIERE',
            ],
            'fiscalite' => 'ASSURANCE_VIE',
            'modeGestion' => [
                'codeModeGestion' => 'param.90909091.LIBRE.Gestionlibre0',
            ],
            'souscripteur' => [
                'noms' => [
                    'codeCivilite' => 'MONSIEUR',
                    'prenom' => 'John',
                    'nom' => 'DOETER',
                    'nomNaissance' => 'DOETER',
                ],
                'residenceFiscale' => [
                    'codePays' => 'XXXXXFRANCE',
                ],
                'nationalite' => 'XXXXXFRANCE',
                'complement' => [
                    'situationFamiliale' => '1',
                    'regimeMatrimonial' => '2',
                    'detailRegimeMatrimonial' => 'rasaarasaarasaarasaarasaa',
                    'situationProfessionnelle' => 'SAL',
                    'csp' => '32',
                    'profession' => 'Cadre en assurances',
                    'nomEmployeur' => 'GENERALI',
                ],
                'ppe' => [
                    'etatPPE' => [
                        'indicateur' => false,
                    ],
                    'etatPPEFamille' => [
                        'indicateur' => false,
                    ],
                ],
                'capaciteJuridique' => '0',
                'naissance' => [
                    'dateNaissance' => '1963-07-09',
                    'lieuNaissance' => 'SAINT-CHAMOND',
                    'codeDepartementNaissance' => '42',
                    'paysNaissance' => 'XXXXXFRANCE',
                    'codeInseeCommuneNaissance' => '207',
                    'codePostal' => '42152',
                ],
                'contact' => [
                    'adressePostale' => [
                        'adresse3LibelleVoie' => '2 rue du pont neuf',
                        'codePostal' => '75001',
                        'commune' => 'PARIS',
                        'codePays' => 'XXXXXFRANCE',
                        'nePasNormaliser' => true,
                    ],
                    'telephone' => '0258632541',
                    'email' => 'john.doeter@orange.fr',
                ],
                'pieceIdentite' => [
                    'codePieceIdentite' => 'FE22',
                    'dateValidite' => '2023-07-09',
                ],
                'secondePieceIdentite' => [
                    'codePieceIdentite' => 'FE21',
                    'dateValidite' => '2023-07-09',
                ],
            ],
            'dossierClient' => [
                'situationPatrimoniale' => [
                    'codeTrancheRevenu' => '5',
                    'montantRevenu' => 125000,
                    'codeTranchePatrimoine' => '6',
                    'montantPatrimoine' => 3000000,
                    'originePatrimoniale' => [
                        [
                            'code' => '6',
                            'precision' => 'Ne sais pas.',
                        ],
                    ],
                    'repartitionPatrimoniale' => [
                        [
                            'code' => '6',
                            'pourcentage' => 1,
                            'precision' => 'Ne sais pas.',
                        ],
                    ],
                ],
                'objectifsVersement' => [
                    [
                        'codeObjectif' => '6',
                        'precision' => 'A définir',
                    ],
                ],
                'originePaiement' => [
                    'moyenPaiementFrancais' => true,
                ],
            ],
            'versementInitial' => [
                'montant' => 10000,
                'repartition' => [
                    [
                        'codeFonds' => 'PICTEASE',
                        'montant' => 10000,
                    ],
                ],
            ],
            'versementsLibresProgrammes' => [
                'repartition' => [
                    [
                        'codeFonds' => 'PICTEASE',
                        'montant' => 200,
                    ],
                ],
                'vlpMontant' => [
                    'montant' => 200,
                    'periodicite' => 'MENSUELLE',
                ],
            ],
            'reglement' => [
                'typeReglementVersementPonctuel' => 'PRELEVEMENT',
                'ibanContractant' => [
                    'nomBanque' => 'CE COTE D AZUR NICE',
                    'titulaire' => 'DOEBIS John',
                    'iban' => 'FR7618315100000431563892239',
                    'bic' => 'CEPAFRPP831',
                    'autorisationPrelevement' => true,
                ],
                'originesFonds' => [
                    [
                        'code' => '1',
                        'montant' => 12400,
                        'date' => '2018-10-12',
                        'precision' => 'test',
                        'codesDetail' => [
                            '1',
                        ],
                    ],
                ],
            ],
            'clauseBeneficiaireDeces' => [
                'code' => 'clause.A',
                'texteLibre' => 'cf. acte notarie nXXXXX',
            ],
            'codeGarantiePrevoyance' => 'garantiePrevoyance.aucune',
            'commentaire' => 'Souscription de test',
            'dematerialisationCourriers' => true,
            'dateSignature' => '2019-05-24',
        ]);
        $this->dummyDocument = new File('%s/Tests/Resources/empty_document.pdf', self::getContainer()->getParameter('kernel.project_dir'));
    }

    public function testGetData()
    {
        $apiResponse = $this->client->getData();

        $this->assertInstanceOf(ApiResponse::class, $apiResponse);
        $this->assertInstanceOf(RetourConsultationSouscription::class, $apiResponse->getDonnees());
    }

    public function testInit()
    {
        $apiResponse = $this->client->init();

        $this->assertInstanceOf(ApiResponse::class, $apiResponse);
        $this->assertNotNull($apiResponse->getStatut());
    }

    public function testCheck()
    {
        $apiResponse = $this->client->init();
        $apiResponse = $this->client->check(
            (new Contexte())->setStatut($apiResponse->getStatut()),
            $this->subscription
        );

        $this->assertInstanceOf(ApiResponse::class, $apiResponse);
    }

    public function testConfirm()
    {
        $apiResponse = $this->client->init();
        $context = (new Contexte())->setStatut($apiResponse->getStatut());
        $this->client->check($context, $this->subscription);

        $apiResponse = self::$registry->getSubscription()->confirm($context);

        $this->assertInstanceOf(ApiResponse::class, $apiResponse);
        $this->assertNotNull($apiResponse->getDonnees()->getIdTransaction());
        $this->assertNotNull($apiResponse->getDonnees()->getPiecesAFournir());
    }

    public function testFinalize()
    {
        $apiResponse = $this->client->init();
        $context = (new Contexte())->setStatut($apiResponse->getStatut());
        $this->client->check($context, $this->subscription);

        $apiResponse = self::$registry->getSubscription()->confirm($context);

        $idTransaction = $apiResponse->getDonnees()->getIdTransaction();

        foreach ($apiResponse->getDonnees()->getPiecesAFournir() as $document) {
            if (0 === $document->getNombreMin()) { // Exclude optional document
                continue;
            }

            self::$registry->getDocument()->uploadDocument(
                $idTransaction,
                $document->setFile($this->dummyDocument)
            );
        }

        $apiResponse = self::$registry->getSubscription()->finalize(
            (new Contexte())->setIdTransaction($idTransaction)
        );

        $this->assertInstanceOf(ApiResponse::class, $apiResponse);
    }
}

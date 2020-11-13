# GeneraliSubscriptionClient - Examples

#### Create a subscription

```php
<?php

namespace App\Controller;

use Mpp\GeneraliClientBundle\Client\GeneraliClientRegistryInterface;
use Mpp\GeneraliClientBundle\Factory\ModelFactory;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\Souscription;
use Mpp\GeneraliClientBundle\Model\PieceAFournir;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleController extends AbstractController
{
    /**
     * @var GeneraliClientRegistryInterface
     */
    private $registry;

    /**
     * @var ModelFactory
     */
    private $factory;

    public function __construct(GeneraliClientRegistryInterface $registry, ModelFactory $factory)
    {
        $this->registry = $registry;
        $this->factory = $factory;
    }

    public function exampleAction()
    {
        $apiResponse = $this->registry->getSubscription()->init();

        $this->registry->getSubscription()->check(
            (new Contexte())->setStatut($apiResponse->getStatut()),
            $this->factory->createFromArray(Souscription::class, [
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
            ])
        );

        $idTransaction = $apiResponse->getDonnees()->getIdTransaction();

        $apiResponse = $this->registry->getSubscription()->confirm(
            (new Contexte())->setStatut($apiResponse->getStatut())->setAdresseEmailCopie('toto@monpartenaire.com')
        );

        foreach ($apiResponse->getDonnees()->getPiecesAFournir() as $document) {
            if ($document->getNombreMin() === 0) { // Exclude optional document
                continue;
            }

            $this->registry->getDocument()->uploadDocument(
                $idTransaction,
                $document->setFile(new File('path/to/file'))
            );
        }


        $apiResponse = $this->registry->getSubscription()->finalize(
            (new Contexte())->setIdTransaction($idTransaction)
        );
    }
}
```

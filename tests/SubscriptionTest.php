<?php

namespace MPP\GeneraliClientBundle\tests;

use Constant\Souscription;
use Faker;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;
use PHPUnit\Framework\TestCase;

/**
 * Class SouscriptionTest
 * @package MPP\GeneraliClientBundle\tests
 */
class SubscriptionTest extends TestCase
{
    private $faker;
    /** SouscriptionTest constructor.*/
    public function __construct()
    {
        parent::__construct();
        $this->faker = Faker\Factory::create('fr_FR');
    }
    /** @return array */
    private function buildData()
    {
        $periodicites =  ['MENSUELLE'];
        $typeSecurisation = ['AUTOMATIQUE', 'SPECIFIQUE'];
        $typePaiement =  ['PRELEVEMENT'];
        $typeDuree = ['VIE_ENTIERE'];
        $fiscalite = ['ASSURANCE_VIE'];

        $situationFamiliale = Souscription::SITUATIONSFAMILIALES[$this->faker->numberBetween(0, count(Souscription::SITUATIONSFAMILIALES)-1)]['code'];
        $codePays = Souscription::PAYSRESIDENCEFISCALE[$this->faker->numberBetween(0, count(Souscription::PAYSRESIDENCEFISCALE)-1)]['code'];
        $tranchePatrimoniale =  Souscription::TRANCHESPATRIMOINE[$this->faker->numberBetween(0, count(Souscription::TRANCHESPATRIMOINE)-1)];
        $trancheRevenu = Souscription::TRANCHESREVENUS[$this->faker->numberBetween(0, count(Souscription::TRANCHESREVENUS)-1)];
        $montant1 = $this->faker->numberBetween(0, 999999);
        $montant2 = $this->faker->numberBetween(0, 999999);
        $montant3 = $this->faker->numberBetween(0, 999);

        $response = [
            'contexte'=> [
                'codeApporteur'=> $this->getParameter('generali_code_apporteur'),
                'codeSouscription'=> $this->codeSouscription,
                'elementsAttendus'=> [
                    $this->faker->text,
                    $this->faker->text
                ],
            ],
            'souscription'=> [
                'referencesExternes'=> [
                    'refExterne'=> $this->faker->text(12),
                    'refExterne2'=> $this->faker->text(12)
                ],
                'souscripteur'=> [
                    'noms'=> [
                        'codeCivilite'=> Souscription::CIVILITES[$this->faker->numberBetween(0, count(Souscription::CIVILITES)-1)]['code'],
                        'prenom'=> $this->faker->firstName,
                        'nom'=> $this->faker->lastName,
                        'nomNaissance'=> $this->faker->lastName
                    ],
                    'residenceFiscale'=> [
                        'codePays'=> 'XXXXXFRANCE',
                    ],
                    'naissance'=> [
                        'dateNaissance'=> $this->faker->dateTimeBetween('now - 100 years', 'now - 20 years')->format('Y-m-d'),
                        'lieuNaissance'=> $this->faker->city,
                        'paysNaissance'=> Souscription::PAYSNAISSANCE[0]['code'],
                        'codeDepartementNaissance'=> Souscription::PAYSNAISSANCE[0]['departements'][$this->faker->numberBetween(0, count(Souscription::PAYSNAISSANCE[0]['departements'])-1)]['code'],
                        'codeInseeCommuneNaissance'=> $this->faker->numberBetween(100, 999),
                        'codePostal'=> $this->faker->numberBetween(10000, 99999),
                    ],
                    'nationalite'=> 'XXXXXFRANCE',
                    'complement'=> [
                        'situationFamiliale'=> $situationFamiliale,
                        'situationProfessionnelle'=>Souscription::SITUATIONSPROFESSIONNELLES[$this->faker->numberBetween(0, count(Souscription::SITUATIONSPROFESSIONNELLES)-1)]['code'],
                        'csp'=> Souscription::CSPS[$this->faker->numberBetween(0, count(Souscription::CSPS)-1)]['code'],
                        'profession'=> $this->faker->jobTitle,
                        'codeNaf'=> Souscription::CODESNAF[$this->faker->numberBetween(0, count(Souscription::CODESNAF)-1)]['code'],
                        "siret"=> 83105145300015,
                        'nomEmployeur'=> 'MON PETIT PLACEMENT',
                        'cspDerniereProfession'=> Souscription::CSPS[$this->faker->numberBetween(0, count(Souscription::CSPS)-1)]['code'],
                        'dateDebutInactivite'=> $this->faker->date('Y-m-d'),
                    ],
                    'contact'=> [
                        'adressePostale'=> [
                            'adresse1PointRemise'=> '',
                            'adresse2PointGeographique'=> '',
                            'adresse3LibelleVoie'=> $this->faker->streetAddress,
                            'adresse4LieuDitBP'=> '',
                            'codePostal'=> $this->faker->numberBetween(10000, 99999),
                            'commune'=> $this->faker->city,
                            'codePays'=> Souscription::PAYSADRESSES[$this->faker->numberBetween(0, count(Souscription::PAYSADRESSES)-1)]['code'],
                            'nePasNormaliser'=> true
                        ],
                        'telephone'=> '03'.$this->faker->numberBetween(10000000, 99999999),
                        'telephonePortable'=> '06'.$this->faker->numberBetween(10000000, 99999999),
                        'email'=> $this->faker->email
                    ],
                    'ppe'=> [
                        'etatPPE'=> [
                            'indicateur'=> false,
                        ],
                        'etatPPEFamille'=> [
                            'indicateur'=> false,
                        ],
                    ],
                    'fatca'=> [
                        'citoyenUSA'=> false,
                        'residenceUSA'=> false,
                    ],
                    'pieceIdentite'=> [
                        'codePieceIdentite'=> Souscription::PIECESIDENTITE[$this->faker->numberBetween(0, count(Souscription::PIECESIDENTITE)-1)]['code'],
                        'dateValidite'=> $this->faker->dateTimeBetween('now + 1 year', 'now + 3 years')->format('Y-m-d')
                    ],
                    'capaciteJuridique'=> Souscription::CAPACITESJURIDIQUES[$this->faker->numberBetween(0, count(Souscription::CAPACITESJURIDIQUES)-1)]['code']
                ],
                'coSouscripteur'=> [
                    'noms'=> [
                        'codeCivilite'=> Souscription::CIVILITES[$this->faker->numberBetween(0, count(Souscription::CIVILITES)-1)]['code'],
                        'prenom'=> $this->faker->firstName,
                        'nom'=> $this->faker->lastName,
                        'nomNaissance'=> $this->faker->lastName
                    ],
                    'residenceFiscale'=> [
                        'codePays'=> 'XXXXXFRANCE',
                    ],
                    'naissance'=> [
                        'dateNaissance'=> $this->faker->dateTimeBetween('now - 100 years', 'now - 20 years')->format('Y-m-d'),
                        'lieuNaissance'=> $this->faker->city,
                        'paysNaissance'=> Souscription::PAYSNAISSANCE[0]['code'],
                        'codeDepartementNaissance'=> Souscription::PAYSNAISSANCE[0]['departements'][$this->faker->numberBetween(0, count(Souscription::PAYSNAISSANCE[0]['departements'])-1)]['code'],
                        'codeInseeCommuneNaissance'=> $this->faker->numberBetween(100, 999),
                        'codePostal'=> $this->faker->numberBetween(10000, 99999),
                    ],
                    'nationalite'=> 'XXXXXFRANCE',
                    'complement'=> [
                        'situationFamiliale'=>$situationFamiliale,
                        'situationProfessionnelle'=>Souscription::SITUATIONSPROFESSIONNELLES[$this->faker->numberBetween(0, count(Souscription::SITUATIONSPROFESSIONNELLES)-1)]['code'],
                        'regimeMatrimonial'=> $situationFamiliale === 5 ? Souscription::REGIMESMATRIMONIAUX[$this->faker->numberBetween(0, count(Souscription::REGIMESMATRIMONIAUX)-1)]['code'] : null,
                        'csp'=> Souscription::CSPS[$this->faker->numberBetween(0, count(Souscription::CSPS)-1)]['code'],
                        'profession'=> $this->faker->jobTitle,
                        'codeNaf'=> Souscription::CODESNAF[$this->faker->numberBetween(0, count(Souscription::CODESNAF)-1)]['code'],
                        "siret"=> 83105145300015,
                        'nomEmployeur'=> $this->faker->company,
                        'cspDerniereProfession'=> Souscription::CSPS[$this->faker->numberBetween(0, count(Souscription::CSPS)-1)]['code'],
                        'dateDebutInactivite'=> $this->faker->date('Y-m-d'),
                    ],
                    'contact'=> [
                        'adressePostale'=> [
                            'adresse1PointRemise'=> '',
                            'adresse2PointGeographique'=> '',
                            'adresse3LibelleVoie'=> $this->faker->streetAddress,
                            'adresse4LieuDitBP'=> '',
                            'codePostal'=> $this->faker->numberBetween(10000, 99999),
                            'commune'=> $this->faker->city,
                            'nePasNormaliser'=> true,
                            'codePays'=> Souscription::PAYSADRESSES[$this->faker->numberBetween(0, count(Souscription::PAYSADRESSES)-1)]['code'],
                        ],
                        'telephone'=> '03'.$this->faker->numberBetween(10000000, 99999999),
                        'telephonePortable'=> '06'.$this->faker->numberBetween(10000000, 99999999),
                        'email'=> $this->faker->email
                    ],
                    'ppe'=> [
                        'etatPPE'=> [
                            'indicateur'=> false,
                        ],
                        'etatPPEFamille'=> [
                            'indicateur'=> false,
                        ],
                    ],
                    'fatca'=> [
                        'citoyenUSA'=>false,
                        'residenceUSA'=> false,
                    ],
                    'pieceIdentite'=> [
                        'codePieceIdentite'=> Souscription::PIECESIDENTITE[$this->faker->numberBetween(0, count(Souscription::PIECESIDENTITE)-1)]['code'],
                        'dateValidite'=> $this->faker->dateTimeBetween('now + 1 year', 'now + 3 years')->format('Y-m-d')
                    ],
                    'capaciteJuridique'=> Souscription::CAPACITESJURIDIQUES[$this->faker->numberBetween(0, count(Souscription::CAPACITESJURIDIQUES)-1)]['code'],

                    'codeLienSouscripteur'=> $this->faker->text,
                    'detailLienSouscripteur'=> $this->faker->text
                ],
                'dossierClient'=> [
                    'situationPatrimoniale'=> [
                        'codeTrancheRevenu'=> $trancheRevenu['code'],
                        'codeTranchePatrimoine'=> $tranchePatrimoniale['code'],
                        'originePatrimoniale'=> [
                            [
                                'code'=> Souscription::ORIGINESPATRIMOINE[$this->faker->numberBetween(0, count(Souscription::ORIGINESPATRIMOINE)-1)]['code'],
                                'precision'=> $this->faker->text,
                            ]
                        ],
                        'repartitionPatrimoniale'=> [
                            [
                                'code'=> Souscription::REPARTITIONSPATRIMOINE[$this->faker->numberBetween(0, count(Souscription::REPARTITIONSPATRIMOINE)-1)]['code'],
                                'pourcentage'=> 1,
                                'precision'=> $this->faker->text
                            ]
                        ],
                        'montantRevenu'=> $this->faker->numberBetween(isset($trancheRevenu['trancheMin']) ? $trancheRevenu['trancheMin'] : 0, isset($trancheRevenu['trancheMax']) ? $trancheRevenu['trancheMax'] : 9999999999),
                        'montantPatrimoine'=> $this->faker->numberBetween(isset($tranchePatrimoniale['trancheMin']) ? $tranchePatrimoniale['trancheMin'] : 0, isset($tranchePatrimoniale['trancheMax'] ) ? $tranchePatrimoniale['trancheMax'] : 9999999999)
                    ],
                    'objectifsVersement'=> [
                        [
                            'codeObjectif'=> Souscription::OBJECTIFSVERSEMENT[$this->faker->numberBetween(0, count(Souscription::OBJECTIFSVERSEMENT)-1)]['code'],
                            'precision'=> $this->faker->text
                        ]
                    ],
                    'originePaiement'=> [
                        'moyenPaiementFrancais'=> true,
                        'paiementParTiersPayeur'=> false,
                        'tiersPayeur'=> [
                            'personnePhysique'=> $this->faker->boolean,
                            'nom'=> $this->faker->lastName,
                            'prenom'=> $this->faker->firstName,
                            'adresse'=> $this->faker->address,
                            'parenteAvecSouscripteur'=> $this->faker->boolean,
                            'precisionLienAvecSouscripteur'=> $this->faker->text,
                            'motifIntervention'=> $this->faker->text,
                            'pieceIdentite'=> [
                                'codePieceIdentite'=> Souscription::PIECESIDENTITE[$this->faker->numberBetween(0, count(Souscription::PIECESIDENTITE)-1)]['code'],
                                'dateValidite'=> $this->faker->dateTimeBetween('now + 1 year', 'now + 3 years')->format('Y-m-d')
                            ]
                        ]
                    ],

                ],
                'versementInitial'=> [
                    'montant'=>  $montant1 + $montant2,
                    'repartition'=> [
                        [
                            'codeFonds'=> $this->faker->text,
                            'montant'=>  $montant1,
                            'taux'=>  $this->faker->numberBetween(0, 100),
                            'duree'=>  $this->faker->numberBetween(0, 99999),
                            'numeroEngagement'=>  $this->faker->numberBetween(1, 3),
                            'avenantValide'=> $this->faker->boolean
                        ],
                        [
                            'codeFonds'=> $this->faker->text,
                            'montant'=>  $montant2,
                            'taux'=>  $this->faker->numberBetween(0, 100),
                            'duree'=>  $this->faker->numberBetween(0, 99999),
                            'numeroEngagement'=>  $this->faker->numberBetween(1, 3),
                            'avenantValide'=> $this->faker->boolean
                        ]
                    ]
                ],
                'versementsLibresProgrammes'=> [
                    'repartition'=> [
                        [
                            'codeFonds'=> $this->faker->text,
                            'montant'=>  $montant3,
                            'taux'=>  $this->faker->numberBetween(0, 100),
                            'duree'=>  $this->faker->numberBetween(0, 99999),
                            'numeroEngagement'=>  $this->faker->numberBetween(1, 3),
                            'avenantValide'=> $this->faker->boolean
                        ]
                    ],
                    'jourPrelevement'=>  Souscription::JOURSPRELEVEMENT[0],
                    'vlpMontant'=> [
                        'montant'=>  $montant3,
                        'periodicite'=> $periodicites[$this->faker->numberBetween(0, count($periodicites)-1)]
                    ]
                ],
                'rachatPartielProgramme'=> [
                    'rppMontant'=> [
                        'montant'=>  $this->faker->numberBetween(0, 99999),
                        'periodicite'=> $periodicites[$this->faker->numberBetween(0, count($periodicites)-1)]
                    ],
                    'typeMontant'=> 'BRUT',
                    'fiscalite'=> $fiscalite[$this->faker->numberBetween(0, count($fiscalite)-1)],
//                        'modeRepartitionRpp'=> $modeRepartitionRpp[$this->faker->numberBetween(0, count($modeRepartitionRpp)-1)],
                    'repartition'=> [
                        [
                            'codeFonds'=> $this->faker->text,
                            'montant'=>  $this->faker->numberBetween(0, 99999),
                            'taux'=>  $this->faker->numberBetween(0, 100),
                            'duree'=>  $this->faker->numberBetween(0, 99999),
                            'numeroEngagement'=>  $this->faker->numberBetween(1, 3),
                            'avenantValide'=> $this->faker->boolean
                        ], [
                            'codeFonds'=> $this->faker->text,
                            'montant'=>  $this->faker->numberBetween(0, 99999),
                            'taux'=>  $this->faker->numberBetween(0, 100),
                            'duree'=>  $this->faker->numberBetween(0, 99999),
                            'numeroEngagement'=>  $this->faker->numberBetween(1, 3),
                            'avenantValide'=> $this->faker->boolean
                        ]
                    ]
                ],
                'securisationPlusValues'=> [
                    'codeFondsCible'=> $this->faker->text,
                    'periodicite'=> $periodicites[$this->faker->numberBetween(0, count($periodicites)-1)],
                    'typeSecurisation'=> $typeSecurisation[$this->faker->numberBetween(0, count($typeSecurisation)-1)],
                    'tauxDeclenchement'=>  $this->faker->numberBetween(0, 100),
                    'tableauFonds'=> [
                        [
                            'codeFondsSource'=> $this->faker->text,
                            'tauxDeclenchement'=> $this->faker->numberBetween(0, 100)
                        ],
                        [
                            'codeFondsSource'=> $this->faker->text,
                            'tauxDeclenchement'=> $this->faker->numberBetween(0, 100)
                        ]
                    ]
                ],
                'limitationMoinsValuesV1'=> [
//                        'optionSecurisation'=> $optionSecurisation[$this->faker->numberBetween(0, count($optionSecurisation)-1)],
//                        'typeSecurisation'=> $typeSecurisation[$this->faker->numberBetween(0, count($typeSecurisation)-1)],
                    'securisationFonds'=> [
                        [
                            'codeFondsSource'=> 'AGGV80',
                            'codeFondsCible'=> 'AGGV80',
                            'tauxDeclenchement'=> $this->faker->numberBetween(0, 100)
                        ],
                        [
                            'codeFondsSource'=> 'AGGV80',
                            'codeFondsCible'=> 'AGGV80',
                            'tauxDeclenchement'=> $this->faker->numberBetween(0, 100)
                        ]
                    ]
                ],
                'limitationMoinsValues'=> [
                    'tauxDeclenchement'=>  $this->faker->numberBetween(0, 100),
                    'codeFondsCible'=> $this->faker->text,
                    'codeFondsAExclure'=> [
                        $this->faker->text,
                        $this->faker->text
                    ]
                ],
                'typePaiement'=> $typePaiement[$this->faker->numberBetween(0, count($typePaiement)-1)],
                'duree'=> [
                    'typeDuree'=> $typeDuree[$this->faker->numberBetween(0, count($typeDuree)-1)],
                ],
                'fiscalite'=> $fiscalite[$this->faker->numberBetween(0, count($fiscalite)-1)],
                'clauseBeneficiaireDeces'=> [
                    'denouement'=> Souscription::TYPESDENOUEMENT[$this->faker->numberBetween(0, count(Souscription::TYPESDENOUEMENT)-1)]['code'],
                    'code'=> Souscription::CLAUSESBENEFS[$this->faker->numberBetween(0, count(Souscription::CLAUSESBENEFS)-1)]['code'],
                    'texteLibre'=> $this->faker->text
                ],
                'ouvrirAccesEnLigne'=> $this->faker->boolean,
//                    'modeGestion'=> [
//                        'codeModeGestion' => $this->codeSouscription.'.ModeGestion.LIBRE'
//                    ],
                "modeGestion"=> [
                    "codeModeGestion"=> "param.70017002.LIBRE.Gestionlibre0"
                ],
                'reglement'=> [
                    'originesFonds'=> [
                        [
                            'code'=> Souscription::ORIGINESFONDS[$this->faker->numberBetween(1, count(Souscription::ORIGINESFONDS)-1 )]['code'],
                            'montant'=> $montant1+$montant2 + 12*$montant3,
                            'date'=> $this->faker->date('Y-m-d'),
                            'precision'=> $this->faker->text,
                        ]
                    ]
                ],
                'typeReglementVersementPonctuel'=> 'VIREMENT',
                'ibanContractant'=> [
                    'nomBanque'=> $this->faker->company,
                    'titulaire'=> $this->faker->text,
                    'iban'=> $this->faker->iban('fr'),
                    'bic'=> $this->faker->text,
                    'autorisationPrelevement'=> true,
                    'adresseAgenceBancaire'=> [
                        'adresse1PointRemise'=> '',
                        'adresse2PointGeographique'=> '',
                        'adresse3LibelleVoie'=> $this->faker->streetName,
                        'adresse4LieuDitBP'=> '',
                        'codePostal'=> $this->faker->numberBetween(10000, 99999),
                        'commune'=> $this->faker->city,
                        'codePays'=> $codePays,
                        'nePasNormaliser'=> true
                    ]
                ],
            ],
            'destinataireVirement'=> $this->faker->lastName,
            'codeGarantiePrevoyance'=> $this->faker->text,
            'commentaire'=> $this->faker->text,
            'dematerialisationCourriers'=> $this->faker->boolean,
            'dateSignature'=> $this->faker->date('Y-m-d')
        ];
        if ($situationFamiliale === 5) {
            $response['souscription']['souscripteur']['regimeMatrimonial'] = Souscription::REGIMESMATRIMONIAUX[$this->faker->numberBetween(0, count(Souscription::REGIMESMATRIMONIAUX) - 1)]['code'];
            $response['souscription']['coSouscripteur']['regimeMatrimonial'] = Souscription::REGIMESMATRIMONIAUX[$this->faker->numberBetween(0, count(Souscription::REGIMESMATRIMONIAUX) - 1)]['code'];
        }

        return $response;
    }

    /**
     * @throws GuzzleException
     */
    public function testPOST()
    {
        $request = new Client([
            'base_uri' => $this->parameters->get('generali_endpoint')
        ]);

        $response = $request
            ->post( '/initier', $this->buildData())
        ;

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $data = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('statut', $data);

    }
}

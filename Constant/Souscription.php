<?php

declare(strict_types=1);

namespace Constant;

/**
 * Class Souscription
 * @package Constant
 */
class Souscription
{
    public const CLAUSESBENEFS = [
        [
            'code' => 'clause.A',
            'texte' => 'En cas de décès, je souhaite que le capital public constitué soit versé à une ou plusieurs autres personnes que je désigne de la façon la plus complète possible (Exemple : Nom, Prénom, Date et lieu de naissance, Adresse, Répartition en %] : ',
            'texteLibre' => true,
            'apresTexteLibre' => ', à défaut mes héritiers.',
        ],[
            'code' => 'clause.C',
            'texte' => 'Le conjoint ou le partenaire de PACS de l\'Assuré(e], à défaut les enfants de l\'Assuré(e], nés ou à naître, vivants ou représentés, par parts égales entre eux, à défaut les héritiers de l\'Assuré(e].',
            'texteLibre' => false,
        ],[
            'code' => 'clause.E',
            'texte' => 'Les enfants de l\'Assuré(e], nés ou à naître, vivants ou représentés par parts égales entre eux, à défaut les héritiers de l\'Assuré(e].',
            'texteLibre' => false,
        ],[
            'code' => 'clause.H',
            'texte' => 'Les héritiers de l\'Assuré(e].',
            'texteLibre' => false,
        ],[
            'code' => 'clause.M',
            'texte' => 'Ma clause bénéficiaire est trop longue (supérieure à 180 caractères] pour pouvoir être saisie sur le site. Je la saisirai manuscritement dans le formulaire prévu à cet effet qui est annexé à mon bulletin de souscription.',
            'texteLibre' => false,
        ]
    ];

    public const MODESREGLEMENTAUTORISES = [
        'PRELEVEMENT',
        'VIREMENT',
        'CHEQUE',
    ];

    public const INFOPRODUIT = [
        'libelle' => 'Mon Petit Placement Vie',
        'gerePBDiffere' => false
    ];

    public const TYPESDUREE = [
        [
            'typeDuree' => 'VIE_ENTIERE',
            'libelle' => 'VIE_ENTIERE',
            'dureeNecessaire' => false,
        ], [
            'typeDuree' => 'CAPITAL_DIFFERE',
            'libelle' => 'CAPITAL_DIFFERE',
            'dureeNecessaire' => true,
            'dureeMin' => 8,
            'dureeMax' => 30,
        ],
    ];

    public const TYPESDENOUEMENT = [
        [
            'code' => 'PREMIER_DECES',
            'libelle' => '1er décès',
        ], [
            'code' => 'SECOND_DECES',
            'libelle' => '2nd décès',
        ]
    ];

    public const PARAMVERSEMENTINITIAL = [
        'frais'=> [
            'tauxFraisEuro' => 0,
            'tauxFraisUC' => 0,
            'tauxFraisCroissance' => 0,
            'minTauxFraisEuro' => 0,
            'minTauxFraisUC' => 0,
            'minTauxFraisCroissance' => 0,
        ]
    ];

    public const PARAMVERSEMENTLIBREPROGRAMME = [
        'seuils'=> [
            [
                'minParSupport' => 25,
                'seuilsParPeriodicite' => [
                    [
                        'codePeriodicite' => 'MENSUELLE',
                        'montantMin' => 75,
                    ], [
                        'codePeriodicite' => 'TRIMESTRIELLE',
                    ], [
                        'codePeriodicite' => 'ANNUELLE',
                    ]
                ]
            ]
        ]
    ];

    public const JOURSPRELEVEMENT = [
        10
    ];

    public const SITUATIONSPROFESSIONNELLES = [
        [
            'code' => 'RET',
            'libelle' => 'Retraité',
        ], [
            'code' => 'SAL',
            'libelle' => 'Salarié',
            'listeCsp' => [
                [
                    'code' => '37',
                    'libelle' => 'Professions intermédiaires administratives et commerciales des entreprises',
                ], [
                    'code' => '38',
                    'libelle' => 'Techniciens',
                ], [
                    'code' => '39',
                    'libelle' => 'Contremaîtres, agents de maîtrise',
                ], [
                    'code' => '40',
                    'libelle' => 'Employés administratifs d\'entreprise',
                ], [
                    'code' => '41',
                    'libelle' => 'Employés de commerce',
                ], [
                    'code' => '42',
                    'libelle' => 'Personnels des services directs aux particuliers',
                ], [
                    'code' => '43',
                    'libelle' => 'Ouvriers qualifiés',
                ], [
                    'code' => '44',
                    'libelle' => 'Ouvriers non qualifiés',
                ], [
                    'code' => '45',
                    'libelle' => 'Ouvriers agricoles',
                ], [
                    'code' => '52',
                    'libelle' => 'Cadres de la fonction publique',
                ], [
                    'code' => '53',
                    'libelle' => 'Professeurs, professions scientifiques',
                ], [
                    'code' => '54',
                    'libelle' => 'Professions de l\'information, des arts et des spectacles',
                ], [
                    'code' => '55',
                    'libelle' => 'Cadres administratifs et commerciaux d\'entreprise',
                ], [
                    'code' => '56',
                    'libelle' => 'Professeurs des écoles, instituteurs et assimilés',
                ], [
                    'code' => '57',
                    'libelle' => 'Professions intermédiaires de la santé et du travail social',
                ], [
                    'code' => '58',
                    'libelle' => 'Clergé, religieux',
                ], [
                    'code' => '59',
                    'libelle' => 'Professions intermédiaires administratives de la fonction publique',
                ], [
                    'code' => '60',
                    'libelle' => 'Employés civils et agents de service de la fonction publique',
                ], [
                    'code' => '61',
                    'libelle' => 'Policiers et militaires',
                ], [
                    'code' => '63',
                    'libelle' => 'Ingénieurs et cadres techniques d\'entreprise',
                ]
            ]
        ], [
            'code' => 'NPR',
            'libelle' => 'Sans activité',
        ], [
            'code' => 'NSAL',
            'libelle' => 'Travailleur non salarié',
            'listeCsp' => [
                [
                    'code' => '32',
                    'libelle' => 'Agriculteurs exploitants',
                ], [
                    'code' => '33',
                    'libelle' => 'Artisans',
                ], [
                    'code' => '34',
                    'libelle' => 'Commerçants et assimilés',
                ], [
                    'code' => '35',
                    'libelle' => 'Chefs d\'entreprise de 10 salariés ou plus',
                ], [
                    'code' => '36',
                    'libelle' => 'Professions libérales et assimilés',
                ], [
                    'code' => '57',
                    'libelle' => 'Professions intermédiaires de la santé et du travail social',
                ]
            ]
        ]
    ];

    public const SITUATIONSFAMILIALES = [
        [
            'code' => '1',
            'libelle' => 'Célibataire',
        ], [
            'code' => '3',
            'libelle' => 'Divorcé(e]',
        ], [
            'code' => '5',
            'libelle' => 'Marié(e] sous le régime',
        ], [
            'code' => '8',
            'libelle' => 'Pacsé(e]',
        ], [
            'code' => '4',
            'libelle' => 'Séparé(e]',
        ], [
            'code' => '7',
            'libelle' => 'Union libre',
        ], [
            'code' => '2',
            'libelle' => 'Veuf(ve]',
        ],
    ];

    public const TRANCHESREVENUS = [
        [
            'code' => '1',
            'libelle' => '0 à 25 000',
            'trancheMin' => 0,
            'trancheMax' => 25000,
        ], [
            'code' => '5',
            'libelle' => '100 000 à 150 000',
            'trancheMin' => 100000,
            'trancheMax' => 150000,
        ], [
            'code' => '6',
            'libelle' => '150 000 à 300 000',
            'trancheMin' => 150000,
            'trancheMax' => 300000,
        ], [
            'code' => '2',
            'libelle' => '25 000 à 50 000',
            'trancheMin' => 25000,
            'trancheMax' => 50000,
        ], [
            'code' => '7',
            'libelle' => 'Plus de 300 000',
            'trancheMin' => 300000,
        ], [
            'code' => '3',
            'libelle' => '50 000 à 75 000',
            'trancheMin' => 50000,
            'trancheMax' => 75000,
        ], [
            'code' => '4',
            'libelle' => '75 000 à 100 000',
            'trancheMin' => 75000,
            'trancheMax' => 100000,
        ],
    ];

    public const TRANCHESPATRIMOINE = [
        [
            'code' => '1',
            'libelle' => '0 à 100 000',
            'trancheMin' => 0,
            'trancheMax' => 100000,
        ], [
            'code' => '5',
            'libelle' => '1 000 000 à 2 000 000',
            'trancheMin' => 1000000,
            'trancheMax' => 2000000,
        ], [
            'code' => '8',
            'libelle' => 'Plus de 10 000 000',
            'trancheMin' => 10000000,
        ], [
            'code' => '2',
            'libelle' => '100 000 à 300 000',
            'trancheMin' => 100000,
            'trancheMax' => 300000,
        ], [
            'code' => '6',
            'libelle' => '2 000 000 à 5 000 000',
            'trancheMin' => 2000000,
            'trancheMax' => 5000000,
        ], [
            'code' => '3',
            'libelle' => '300 000 à 500 000',
            'trancheMin' => 300000,
            'trancheMax' => 500000,
        ], [
            'code' => '7',
            'libelle' => '5 000 000 à 10 000 000',
            'trancheMin' => 5000000,
            'trancheMax' => 10000000,
        ], [
            'code' => '4',
            'libelle' => '500 000 à 1 000 000',
            'trancheMin' => 500000,
            'trancheMax' => 1000000,
        ],
    ];

    public const ORIGINESFONDS = [
        [
            'code' => '1',
            'libelle' => 'Revenus',
            'dateNecessaire' => false,
            'commentaireNecessaire' => false,
            'detail' => [
                [
                    'code' => '3',
                    'libelle' => 'Prime ponctuelle / Indemnités',
                ], [
                    'code' => '4',
                    'libelle' => 'Rente',
                ], [
                    'code' => '1',
                    'libelle' => 'Revenu de l\'activité',
                ], [
                    'code' => '2',
                    'libelle' => 'Revenus locatifs - fonciers',
                ],
            ],
            'bloquantDemat' => false,
        ], [
            'code' => '3',
            'libelle' => 'Héritage',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '4',
            'libelle' => 'Donation',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '5',
            'libelle' => 'Cession d\'actifs immobiliers',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '6',
            'libelle' => 'Cession d\'actifs mobiliers',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '7',
            'libelle' => 'Cession d\'actifs professionnel',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '8',
            'libelle' => 'Cession d\'actifs autres',
            'dateNecessaire' => true,
            'commentaireNecessaire' => true,
            'bloquantDemat' => false,
        ], [
            'code' => '9',
            'libelle' => 'Gains au jeu',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => true,
        ], [
            'code' => '10',
            'libelle' => 'Autres',
            'dateNecessaire' => true,
            'commentaireNecessaire' => true,
            'bloquantDemat' => true,
        ], [
            'code' => '11',
            'libelle' => 'Epargne (sur livret, PEE, PEA, etc.]',
            'dateNecessaire' => false,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '12',
            'libelle' => 'Epargne salariale et d\'entreprise',
            'dateNecessaire' => false,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '13',
            'libelle' => 'Capital de contrats (rachat, terme, bénéfice, etc.]',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '14',
            'libelle' => 'Versement de dividendes',
            'dateNecessaire' => false,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '15',
            'libelle' => 'Remboursement de compte courant d\'associé',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ], [
            'code' => '16',
            'libelle' => 'Cession d\'oeuvres d\'art',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
    ];

    public const LIENSCOCONTRACTANT = [
        [
            'code' => '2',
            'libelle' => 'Autre',
        ], [
            'code' => '1',
            'libelle' => 'Conjoint',
        ],
    ];

    public const FONCTIONSPPE = [
        [
            'code' => '6',
            'libelle' => 'Ambassadeur, chargé d\'affaires, consul général et consul de carrière',
        ], [
            'code' => '1',
            'libelle' => 'Chef d\'Etat, chef de gouvernement, membre d\'un gouvernement national ou de la Commission Européenne',
        ], [
            'code' => '9',
            'libelle' => 'Dirigeant d\'une institution internationale publique créée par un traité',
        ], [
            'code' => '5',
            'libelle' => 'Dirigeant ou membre de l\'organe de direction d\'une banque centrale',
        ], [
            'code' => '8',
            'libelle' => 'Membre d\'un organe d\'administration, de direction ou de surveillance d\'une entreprise publique',
        ], [
            'code' => '2',
            'libelle' => 'Membre d\'une assemblée parlementaire nationale ou du Parlement européen',
        ], [
            'code' => '4',
            'libelle' => 'Membre d\'une cour des comptes',
        ], [
            'code' => '3',
            'libelle' => 'Membre d\'une cour suprême, d\'une cour public constitutionnelle ou d\'une autre haute juridiction dont les décisions ne sont pas, sauf cirpublic constances exceptionnelles, susceptibles de recours',
        ], [
            'code' => '7',
            'libelle' => 'Officier général ou officier supérieur assurant le commandement d\'une armée',
        ],
    ];

    public const LIENSCONTRACTANTPPE = [
        [
            'code' => '3',
            'libelle' => 'En ligne directe, les ascendants, descendants et alliés, au premier degré, ainsi que leur conjoint, leur partenaire lié par un pacte civil de solidarité ou par un contrat de partenariat enregistré en vertu d\'une loi étrangère',
        ], [
            'code' => '1',
            'libelle' => 'Le conjoint ou le concubin notoire',
        ], [
            'code' => '2',
            'libelle' => 'Le partenaire lié par un pacte civil de solidarité ou par un contrat de partenariat enregistré en vertu d\'une loi étrangère',
        ], [
            'code' => '5',
            'libelle' => 'Toute personne physique connue comme entretenant des liens d\'affaires étroits avec ce client',
        ], [
            'code' => '4',
            'libelle' => 'Toute personne physique identifiée comme étant le bénéficiaire effectif d\'une personne morale conjointement avec ce client ;',
        ],
    ];

    public const OBJECTIFSVERSEMENT = [
        [
            'code' => '6',
            'libelle' => 'Autres',
        ], [
            'code' => '7',
            'libelle' => 'public constituer un capital',
        ], [
            'code' => '3',
            'libelle' => 'Disposer de revenus complémentaires futurs (retraite]',
        ], [
            'code' => '4',
            'libelle' => 'Disposer de revenus complémentaires immédiats',
        ], [
            'code' => '5',
            'libelle' => 'Financer un projet futur',
        ], [
            'code' => '1',
            'libelle' => 'Transmettre un capital à mes héritiers ou à des tiers',
        ], [
            'code' => '2',
            'libelle' => 'Utiliser le contrat comme un instrument de garantie',
        ],
    ];

    public const CODESNAF = [
        [
            'code' => '14',
            'libelle' => 'Activités de services administratifs et de soutien',
        ], [
            'code' => '20',
            'libelle' => 'Activités des ménages en tant qu\'employeurs',
        ], [
            'code' => '21',
            'libelle' => 'Activités extra-territoriales',
        ], [
            'code' => '11',
            'libelle' => 'Activités financières et d\'assurance',
        ], [
            'code' => '12',
            'libelle' => 'Activités immobilières',
        ], [
            'code' => '13',
            'libelle' => 'Activités spécialisées, scientifiques et techniques',
        ], [
            'code' => '15',
            'libelle' => 'Administration publique',
        ], [
            'code' => '1',
            'libelle' => 'Agriculture, sylviculture et pêche',
        ], [
            'code' => '18',
            'libelle' => 'Arts, spectacles et activités récréatives',
        ], [
            'code' => '19',
            'libelle' => 'Autres activités de services',
        ], [
            'code' => '6',
            'libelle' => 'public construction',
        ], [
            'code' => '16',
            'libelle' => 'Enseignement',
        ], [
            'code' => '9',
            'libelle' => 'Hébergement et restauration',
        ], [
            'code' => '3',
            'libelle' => 'Industrie manufacturière',
        ], [
            'code' => '2',
            'libelle' => 'Industries extractives',
        ], [
            'code' => '10',
            'libelle' => 'Information et communication',
        ], [
            'code' => '22',
            'libelle' => 'Non défini',
        ], [
            'code' => '5',
            'libelle' => 'Production et distribution d\'eau , assainissement gestion des déchets et dépollution',
        ], [
            'code' => '4',
            'libelle' => 'Production et distribution d\'électricité de gaz de vapeur et d\'air conditionné',
        ], [
            'code' => '17',
            'libelle' => 'Santé humaine et action sociale',
        ], [
            'code' => '8',
            'libelle' => 'Transports et entreposage',
        ], [
            'code' => '7',
            'libelle' => 'commerce, réparation d\'automobile et de motocycles',
        ],
    ];

    public const CSPS = [
        [
            'code' => '32',
            'libelle' => 'Agriculteurs exploitants',
        ], [
            'code' => '33',
            'libelle' => 'Artisans',
        ], [
            'code' => '55',
            'libelle' => 'Cadres administratifs et commerciaux d\'entreprise',
        ], [
            'code' => '52',
            'libelle' => 'Cadres de la fonction publique',
        ], [
            'code' => '35',
            'libelle' => 'Chefs d\'entreprise de 10 salariés ou plus',
        ], [
            'code' => '58',
            'libelle' => 'Clergé, religieux',
        ], [
            'code' => '34',
            'libelle' => 'Commerçants et assimilés',
        ], [
            'code' => '39',
            'libelle' => 'Contremaîtres, agents de maîtrise',
        ], [
            'code' => '40',
            'libelle' => 'Employés administratifs d\'entreprise',
        ], [
            'code' => '60',
            'libelle' => 'Employés civils et agents de service de la fonction publique',
        ], [
            'code' => '41',
            'libelle' => 'Employés de commerce',
        ], [
            'code' => '63',
            'libelle' => 'Ingénieurs et cadres techniques d\'entreprise',
        ], [
            'code' => '0',
            'libelle' => 'Non renseigné',
        ], [
            'code' => '45',
            'libelle' => 'Ouvriers agricoles',
        ], [
            'code' => '44',
            'libelle' => 'Ouvriers non qualifiés',
        ], [
            'code' => '43',
            'libelle' => 'Ouvriers qualifiés',
        ], [
            'code' => '42',
            'libelle' => 'Personnels des services directs aux particuliers',
        ], [
            'code' => '61',
            'libelle' => 'Policiers et militaires',
        ], [
            'code' => '56',
            'libelle' => 'Professeurs des écoles, instituteurs et assimilés',
        ], [
            'code' => '53',
            'libelle' => 'Professeurs, professions scientifiques',
        ], [
            'code' => '54',
            'libelle' => 'Professions de l\'information, des arts et des spectacles',
        ], [
            'code' => '59',
            'libelle' => 'Professions intermédiaires administratives de la fonction publique',
        ], [
            'code' => '37',
            'libelle' => 'Professions intermédiaires administratives et commerciales des entreprises',
        ], [
            'code' => '57',
            'libelle' => 'Professions intermédiaires de la santé et du travail social',
        ], [
            'code' => '36',
            'libelle' => 'Professions libérales et assimilés',
        ], [
            'code' => '38',
            'libelle' => 'Techniciens',
        ],
    ];

    public const PAYSRESIDENCEFISCALE = [
        [
            'code' => 'XXXXXFRANCE',
            'libelle' => 'FRANCE',
        ], [
            'code' => 'XXXXXGUADELOUPE',
            'libelle' => 'GUADELOUPE',
        ], [
            'code' => 'XXXXXGUYANE',
            'libelle' => 'GUYANE',
        ], [
            'code' => 'XXXXXMARTINIQUE',
            'libelle' => 'MARTINIQUE',
        ], [
            'code' => 'XXXXXNOUVELLE-CALEDONIE',
            'libelle' => 'NOUVELLE-CALEDONIE',
        ], [
            'code' => 'XXXXXPOLYNESIE FRANCAISE',
            'libelle' => 'POLYNESIE FRANCAISE',
        ], [
            'code' => 'XXXXXREUNION',
            'libelle' => 'REUNION',
        ], [
            'code' => '99109',
            'libelle' => 'ALLEMAGNE',
        ], [
            'code' => '99110',
            'libelle' => 'AUTRICHE',
        ], [
            'code' => '99131',
            'libelle' => 'BELGIQUE',
        ],[
            'code' => '99101',
            'libelle' => 'DANEMARK',
        ],[
            'code' => '99134',
            'libelle' => 'ESPAGNE',
        ], [
            'code' => '99132GUERNESEY',
            'libelle' => 'GUERNESEY',
        ], [
            'code' => '99136',
            'libelle' => 'IRLANDE, OU EIRE',
        ], [
            'code' => '99127',
            'libelle' => 'ITALIE',
        ], [
            'code' => '99132JERSEY',
            'libelle' => 'JERSEY',
        ], [
            'code' => '99137',
            'libelle' => 'LUXEMBOURG',
        ], [
            'code' => '99132MAN (ILE]',
            'libelle' => 'MAN (ILE]',
        ], [
            'code' => '99135',
            'libelle' => 'PAYS-BAS',
        ], [
            'code' => '99139',
            'libelle' => 'PORTUGAL',
        ], [
            'code' => '99132ROYAUME-UNI',
            'libelle' => 'ROYAUME-UNI',
        ], [
            'code' => 'AUTRE_PAYS',
            'libelle' => 'Autre pays',
        ],
    ];

    public const REGIMESMATRIMONIAUX = [
        [
            'code' => '9',
            'libelle' => 'Autre',
        ], [
            'code' => '3',
            'libelle' => 'Communauté conventionnelle',
        ], [
            'code' => '7',
            'libelle' => 'Communauté de meubles et acquêts',
        ], [
            'code' => '1',
            'libelle' => 'Communauté légale',
        ], [
            'code' => '2',
            'libelle' => 'Communauté réduite aux acquêts',
        ], [
            'code' => '4',
            'libelle' => 'Communauté universelle',
        ], [
            'code' => '6',
            'libelle' => 'Participation aux acquêts',
        ], [
            'code' => '5',
            'libelle' => 'Séparation de biens',
        ],
    ];

    public const REPARTITIONSPATRIMOINE = [
        [
            'code' => '1',
            'libelle' => 'Immobilier',
        ], [
            'code' => '2',
            'libelle' => 'Portefeuille de valeurs mobilières',
        ], [
            'code' => '3',
            'libelle' => 'Placements bancaires',
        ],[
            'code' => '4',
            'libelle' => 'Contrats assurance-vie/Capitalisation',
        ], [
            'code' => '6',
            'libelle' => 'Autre',
        ],
    ];

    public const ORIGINESPATRIMOINE = [
        [
            'code' => '1',
            'libelle' => 'Epargne / Revenus',
        ], [
            'code' => '2',
            'libelle' => 'Succession / Donation',
        ], [
            'code' => '3',
            'libelle' => 'Cession d\'actifs immobiliers',
        ], [
            'code' => '4',
            'libelle' => 'Cession d\'actifs professionnel',
        ], [
            'code' => '5',
            'libelle' => 'Gains au jeu',
        ], [
            'code' => '6',
            'libelle' => 'Autre',
        ], [
            'code' => '7',
            'libelle' => 'Cession d\'actifs mobiliers',
        ],
    ];

    public const CAPACITESJURIDIQUES = [
//        [
//          'code' => '4',
//          'libelle' => 'Curatelle renforcée  (Majeur]',
//        ],
//        [
//          'code' => '3',
//          'libelle' => 'Curatelle simple (Majeur]',
//        ],[
//          'code' => '9',
//          'libelle' => 'Emancipé (Mineur]',
//        ],[
//          'code' => '6',
//          'libelle' => 'Habilitation familiale (Majeur]',
//        ],
        [
            'code' => '0',
            'libelle' => 'Majeur juridiquement capable',
        ],
//        [
//          'code' => '11',
//          'libelle' => 'Mandat de protection future (Majeur]',
//        ], [
//          'code' => '5',
//          'libelle' => 'Sauvegarde de justice  (Majeur]',
//        ], [
//          'code' => '8',
//          'libelle' => 'Sous administration légale (Mineur]',
//        ], [
//          'code' => '2',
//          'libelle' => 'Tutelle (Majeur]',
//        ], [
//          'code' => '7',
//          'libelle' => 'Tutelle (Mineur]',
//        ],
    ];
    public const NATIONALITES = [
        [
            'code' => '99109ALLEMAGNE',
            'libelle' => 'Allemande',
        ], [
            'code' => '99110AUTRICHE',
            'libelle' => 'Autrichienne',
        ], [
            'code' => '99131BELGIQUE',
            'libelle' => 'Belge',
        ],[
            'code' => '99101DANEMARK',
            'libelle' => 'Danoise',
        ], [
            'code' => '99134ESPAGNE',
            'libelle' => 'Espagnole',
        ], [
            'code' => '99136IRLANDE, OU EIRE',
            'libelle' => 'Irlandaise',
        ],[
            'code' => '99127ITALIE',
            'libelle' => 'Italienne',
        ],[
            'code' => '99137LUXEMBOURG',
            'libelle' => 'Luxembourgeoise',
        ], [
            'code' => '99135PAYS-BAS',
            'libelle' => 'Hollandaise',
        ], [
            'code' => '99139PORTUGAL',
            'libelle' => 'Portugaise',
        ], [
            'code' => '99132ROYAUME-UNI',
            'libelle' => 'Anglaise',
        ], [
            'code' => 'XXXXXFRANCE',
            'libelle' => 'Française',
        ],
    ];

    public const PIECESJUSTIFICATIVES = [
        [
            'code' => 'FE03',
            'libelle' => 'Un justificatif de domicile de moins de 3 mois si l\'adresse de la pièce d\'identi',
        ], [
            'code' => 'FE04',
            'libelle' => 'Un justificatif de domicile de moins de 3 mois si l\'adresse de la pièce d\'identi',
        ], [
            'code' => 'FE07',
            'libelle' => 'La photocopie du contrat de mariage (communauté universelle avec clause d\'attrib',
        ], [
            'code' => 'FE13',
            'libelle' => 'Mandat d\'arbitrage',
        ], [
            'code' => 'FE20',
            'libelle' => 'CNI en cours de validité ou Passeport ou Permis de conduire ou Carte de séjour o',
        ], [
            'code' => 'FE21',
            'libelle' => 'La Carte Nationale d\'Identité (CNI] du {0}',
        ], [
            'code' => 'FE22',
            'libelle' => 'Le passeport du {0}',
        ], [
            'code' => 'FE23',
            'libelle' => 'Le permis de conduire seconde génération avec date de validité',
        ], [
            'code' => 'FE25',
            'libelle' => 'Pages du livret de famille où figure le {0}',
        ], [
            'code' => 'FE26',
            'libelle' => 'Carte électorale française du {0}',
        ], [
            'code' => 'FE27',
            'libelle' => 'Acte de naissance du {0}',
        ], [
            'code' => 'FE30',
            'libelle' => 'La photocopie recto-verso d\'une pièce officielle d\'identité en cours de validité',
        ], [
            'code' => 'FE31',
            'libelle' => 'Mandat de prélèvement',
        ], [
            'code' => 'FE32',
            'libelle' => 'Le formulaire de déclaration de bénéficiaires (obligatoire si ma clause excède 1',
        ], [
            'code' => 'FE34',
            'libelle' => 'Pièce libre utile en complément du dossier',
        ], [
            'code' => 'FE35',
            'libelle' => 'Le Relevé d\'Identité Bancaire (RIB]',
        ], [
            'code' => 'FE36',
            'libelle' => 'La photocopie d\'un extrait d\'acte de mariage.',
        ], [
            'code' => 'FE37',
            'libelle' => 'L\'attestation d\'ouverture de Plan d\'épargne Populaire (PEP] signée.',
        ], [
            'code' => 'FE38',
            'libelle' => 'La fiche de présentation de mon ${courtier} signée dont je conserve un exemplair',
        ], [
            'code' => 'FE39',
            'libelle' => 'Le questionnaire FATCA/CRS-OCDE complété et signé',
        ], [
            'code' => 'FE40',
            'libelle' => 'Le certificat W8-BEN relatif au co-contractant',
        ], [
            'code' => 'FE41',
            'libelle' => 'Le certificat W8-BEN relatif au contractant',
        ], [
            'code' => 'FE42',
            'libelle' => 'Une pièce par fonds dédié sélectionné. Cette pièce est facultative',
        ], [
            'code' => 'FE43',
            'libelle' => 'Une pièce par fonds dédié sélectionné. Cette pièce est facultative',
        ], [
            'code' => 'FE44',
            'libelle' => 'Bulletin d\'arbitrage signé',
        ], [
            'code' => 'FE45',
            'libelle' => 'Une pièce par fonds dédié sélectionné. Cette pièce est facultative',
        ],[
            'code' => 'FE46',
            'libelle' => 'Une pièce par fonds dédié sélectionné. Cette pièce est facultative',
        ], [
            'code' => 'FF02',
            'libelle' => 'Accord du créancier',
        ], [
            'code' => 'FF03',
            'libelle' => 'Avenant supports structurés',
        ], [
            'code' => 'FF06',
            'libelle' => 'Relevé d\'identité bancaire',
        ], [
            'code' => 'FF07',
            'libelle' => 'Mainlevée du nantissement',
        ], [
            'code' => 'FF08',
            'libelle' => 'Accord du BIA',
        ], [
            'code' => 'FF10',
            'libelle' => 'Signature et CNI du tuteur',
        ], [
            'code' => 'FF12',
            'libelle' => 'Statuts de la société',
        ], [
            'code' => 'FF16',
            'libelle' => 'RF 5000',
        ], [
            'code' => 'FF17',
            'libelle' => 'RF 5002',
        ], [
            'code' => 'FF19',
            'libelle' => 'Notification d\'attribution d\'une pension de vieillesse',
        ], [
            'code' => 'FF20',
            'libelle' => 'Attestation de cessation d\'activités',
        ], [
            'code' => 'FF23',
            'libelle' => 'Jugement de clôture de liquidation judiciaire',
        ], [
            'code' => 'FF24',
            'libelle' => 'Justificatif de cessation d\'activité TNS',
        ], [
            'code' => 'FF25',
            'libelle' => 'Attestation pôle emploi',
        ], [
            'code' => 'FF27',
            'libelle' => 'Attestation d\'absence de contrat de travail',
        ], [
            'code' => 'FF28',
            'libelle' => 'Notification d\'une pension d\'invalidité 2ième ou 3ième catégorie',
        ], [
            'code' => 'FF29',
            'libelle' => 'Acte de décès',
        ], [
            'code' => 'FF30',
            'libelle' => 'Demande du président de la commission de surendettement ou du juge',
        ], [
            'code' => 'FF31',
            'libelle' => 'Certificat d\'identification',
        ], [
            'code' => 'FF32',
            'libelle' => 'Accord ferme et définitif de la Cie concurrente',
        ], [
            'code' => 'FF34',
            'libelle' => 'Pièces justificatives',
        ], [
            'code' => 'FF55',
            'libelle' => 'Annexe tiers payeur dossier client',
        ], [
            'code' => 'FF57',
            'libelle' => 'Lettre d\'engagement Pers. Morales IS',
        ], [
            'code' => 'FF60',
            'libelle' => 'Annexe tracfin',
        ], [
            'code' => 'FF61',
            'libelle' => 'Annexe tracfin non résident (chapitre 31]',
        ], [
            'code' => 'FF62',
            'libelle' => 'Attestation spécifique',
        ], [
            'code' => 'FF63',
            'libelle' => 'Attestation sur l\'honneur',
        ], [
            'code' => 'FF65',
            'libelle' => 'Carte d\'invalidité mentionnant que le titulaire ne peut se livrer à une activité',
        ], [
            'code' => 'FF66',
            'libelle' => 'Convention de démembrement',
        ], [
            'code' => 'FF67',
            'libelle' => 'Copie du livret de famille et/ou acte de mariage',
        ], [
            'code' => 'FF68',
            'libelle' => 'dossier client PM',
        ], [
            'code' => 'FF69',
            'libelle' => 'Ordonnance du juge',
        ], [
            'code' => 'FF70',
            'libelle' => 'Mail d\'accord de la direction / dérogation du conseiller',
        ], [
            'code' => 'FF74',
            'libelle' => 'Dérogation aux frais de gestion',
        ], [
            'code' => 'FF95',
            'libelle' => 'Copie de la carte vitale',
        ], [
            'code' => 'PJ01',
            'libelle' => 'Le bulletin signé.',
        ], [
            'code' => 'PJ06',
            'libelle' => 'Accord du juge des tutelles',
        ], [
            'code' => 'PJ09',
            'libelle' => 'Fiche de paie ou Avis d\'imposition sur le revenu ou Déclaration ISF ou Relevé de',
        ], [
            'code' => 'PJ10',
            'libelle' => '"Lettre de licenciement ou Indemnité de départ volontaire ou Solde de tout compt',
        ], [
            'code' => 'PJ11',
            'libelle' => 'Quittances de loyer',
        ], [
            'code' => 'PJ12',
            'libelle' => 'Avis d\'imposition sur le revenu ou Déclaration IFI',
        ], [
            'code' => 'PJ13',
            'libelle' => 'Relevé de compte faisant apparaitre la sortie des fonds (+ justificatif compléme',
        ], [
            'code' => 'PJ14',
            'libelle' => 'Avis de transfert de l\'épargne bancaire sur le compte courant comprenant la date',
        ], [
            'code' => 'PJ15',
            'libelle' => 'Avis de sortie / rachat du plan d\'épargne entreprise',
        ], [
            'code' => 'PJ16',
            'libelle' => 'Attestation du notaire ou Acte notarié sur la dévolution successorale ou Déclara',
        ], [
            'code' => 'PJ17',
            'libelle' => 'Attestation du notaire ou Acte notarié ou Copie de l\'acte sous seing privé ou Fo',
        ], [
            'code' => 'PJ18',
            'libelle' => 'Attestation du vendeur avec prix de cession ou Acte de cession / certificat de v',
        ], [
            'code' => 'PJ19',
            'libelle' => 'Relevés de portefeuilles titres avec mouvement de cession des titres',
        ], [
            'code' => 'PJ20',
            'libelle' => 'Avis de transfert des fonds sur le compte courant comprenant la date de l\'opérat',
        ], [
            'code' => 'PJ21',
            'libelle' => 'Attestation du notaire avec le montant de cession ou Acte notarié',
        ], [
            'code' => 'PJ22',
            'libelle' => 'Attestation du professionnel (notaire ou avocat] certifiant la cession ou Acte d',
        ], [
            'code' => 'PJ24',
            'libelle' => 'PV de l\'AG autorisant la distribution de dividendes ou Attestation de l\'expert c',
        ], [
            'code' => 'PJ25',
            'libelle' => 'Derniers statuts de la société',
        ], [
            'code' => 'PJ26',
            'libelle' => 'Justificatif du virement des dividendes sur le compte bancaire du client',
        ], [
            'code' => 'PJ27',
            'libelle' => 'Attestation de l\'expert comptable et Ordres de virement entre le compte de l\'ass',
        ], [
            'code' => 'PJ28',
            'libelle' => 'Un justificatif du gain au jeu  (relevé bancaire, copie du chèque de l\'organisme',
        ], [
            'code' => 'PJ29',
            'libelle' => 'Déclaration CERFA 3916 (déclaration d\'un compte ouvert à l\'étranger] : Si le CER',
        ], [
            'code' => 'PJ30',
            'libelle' => 'Déclaration fiscale (IS ou IR avec case 8UU cochée pour un compte à l\'étranger o',
        ], [
            'code' => 'PJ31',
            'libelle' => 'Déclaration de contrat de prêt (CERFA n°2062] ou Acte authentique ou acte sous s',
        ], [
            'code' => 'PJ32',
            'libelle' => 'Avis de transfert des fonds du compte du prêteur sur le compte bancaire du clien',
        ], [
            'code' => 'PJ33',
            'libelle' => 'Jugement de divorce ou Justificatif de versement d\'une indemnité d\'invalidité ou',
        ], [
            'code' => 'PJ34',
            'libelle' => 'Copie du justificatif d\'identité du(es] Représentant(s] légal(aux]',
        ], [
            'code' => 'PJ36',
            'libelle' => 'Un justificatif sur l\'origine des fonds.',
        ], [
            'code' => 'PJ37',
            'libelle' => 'La copie du chèque',
        ], [
            'code' => 'PJ38',
            'libelle' => 'La copie de l\'avis d\'exécution du virement de ${montant-libre} euros corresponda',
        ],[
            'code' => 'PJ40',
            'libelle' => 'si chèque de banque : Copie du chèque de banque',
        ], [
            'code' => 'PJ41',
            'libelle' => 'Si tiers Personne Physique, pièce d\'identité en cours de validité : CNI OU PASSE',
        ], [
            'code' => 'PJ43',
            'libelle' => 'Si Tiers Personne Morale : Statuts à jour, datés et signés',
        ], [
            'code' => 'PJ44',
            'libelle' => 'Extrait K-bis datant de moins de 3 mois',
        ], [
            'code' => 'PJ45',
            'libelle' => 'Si Tiers Personne Morale : Extrait du Journal Officiel ou justificatif d\'immatri',
        ], [
            'code' => 'PJ48',
            'libelle' => 'Justificatif de domicile à l\'étranger',
        ], [
            'code' => 'PJ49',
            'libelle' => 'Une attestation sur l\'honneur précisant le changement de domicile fiscal',
        ], [
            'code' => 'PJ50',
            'libelle' => 'En cas de renonciation à la nationalité américaine, le document en attestant',
        ], [
            'code' => 'PJ51',
            'libelle' => 'Dossier de souscription et de reversement',
        ], [
            'code' => 'PJ52',
            'libelle' => 'Dossier client personne morale',
        ], [
            'code' => 'PJ53',
            'libelle' => 'Statuts à jour, datés et signés et le cas échéant décision collective unanime de',
        ], [
            'code' => 'PJ55',
            'libelle' => 'Liasse fiscale complète (année N-1] et, le cas échéant, une attestation spécifiq',
        ], [
            'code' => 'PJ57',
            'libelle' => 'Lettre d\'engagement',
        ],[
            'code' => 'PJ59',
            'libelle' => 'Pièce(s] d\'identité du Représentant légal et/ou Représentant habilité / Mandatai',
        ], [
            'code' => 'PJ60',
            'libelle' => 'Copie de la délégation de pouvoir',
        ], [
            'code' => 'PJ61',
            'libelle' => 'Pièces d\'idendité du (des] bénéficiaire(s] effectif(s]',
        ], [
            'code' => 'PJ62',
            'libelle' => 'Attestation de l\'expert comptable ou Tout autre document probant',
        ], [
            'code' => 'PJ63',
            'libelle' => 'Attestation du vendeur ou Acte de cession ou Relevé du portefeuille de valeurs m',
        ], [
            'code' => 'PJ64',
            'libelle' => 'Attestation du notaire ou Acte notarié',
        ], [
            'code' => 'PJ65',
            'libelle' => 'Attestaion du notaire ou de l\'avocat ou Acte de cession ou CERFA n°10408*14 ou C',
        ], [
            'code' => 'PJ66',
            'libelle' => 'Lettre de la compagnie d\'assurance',
        ], [
            'code' => 'PJ67',
            'libelle' => 'Chèque de règlement / avis de virement',
        ], [
            'code' => 'PJ68',
            'libelle' => 'PV de l\'AG',
        ], [
            'code' => 'PJ69',
            'libelle' => 'Extrait du Journal Officiel OU justificatif d\'immatriculation à l\'INSEE (pour le',
        ], [
            'code' => 'PJ70',
            'libelle' => 'Questionnaire d\'auto-certification "FATCA / CRS PERSONNE MORALE"',
        ],['code' => 'PJ71',
            'libelle' => 'Le cas échéant le Formulaire W8-BEN-E (FATCA] PERSONNE MORALE',
        ], [
            'code' => 'PJ74',
            'libelle' => 'Questionnaire d\'auto-certification "FATCA / CRS PERSONNE PHYSIQUE" par bénéficia',
        ], [
            'code' => 'PJ75',
            'libelle' => 'Le cas échéant le FORMULAIRE W9 (RESIDENT OU CITOYEN DES ETATS UNIS D\'AMERIQUE]',
        ], [
            'code' => 'PJ76',
            'libelle' => 'Copie de l\'ordonnance de placement des fonds pour une tutelle',
        ], [
            'code' => 'PJ77',
            'libelle' => 'Justificatif complémentaire permettant d\'établir l\'origine antérieur des fonds s',
        ], [
            'code' => 'PJ79',
            'libelle' => 'Avis d\'opération faisant apparaître les références du compte du client débité',
        ], [
            'code' => 'PJ81',
            'libelle' => 'Motif de l\'utilisation de ce mode de paiement',
        ], [
            'code' => 'PJ82',
            'libelle' => 'Copie de l\'Ordonnance de placement de fonds si tutelle',
        ], [
            'code' => 'PJ83',
            'libelle' => 'Acte de donation ou pacte adjoint si tierce administration',
        ], [
            'code' => 'PJ84',
            'libelle' => 'Tout document probant permettant de justifier l?origine des fonds Epargne ',
        ], [
            'code' => 'PJ85',
            'libelle' => 'Tout document probant permettant de justifier l?origine des fonds Revenus ',
        ], [
            'code' => 'PJ86',
            'libelle' => 'Tout document probant permettant de justifier l?origine des fonds Cession d ?act',
        ],
    ];

    public const PAYSNAISSANCE = [
        [
            'code' => 'XXXXXFRANCE',
            'libelle' => 'FRANCE',
            'departements' => [
                [
                    'code' => '01',
                    'libelle' => 'Ain',
                ], [
                    'code' => '02',
                    'libelle' => 'Aisne',
                ], [
                    'code' => '03',
                    'libelle' => 'Allier',
                ], [
                    'code' => '04',
                    'libelle' => 'Alpes-de-Haute-Provence',
                ], [
                    'code' => '05',
                    'libelle' => 'Hautes-Alpes',
                ], [
                    'code' => '06',
                    'libelle' => 'Alpes-Maritimes',
                ], [
                    'code' => '07',
                    'libelle' => 'Ardèche',
                ], [
                    'code' => '08',
                    'libelle' => 'Ardennes',
                ],[
                    'code' => '09',
                    'libelle' => 'Ariège',
                ],[
                    'code' => '10',
                    'libelle' => 'Aube',
                ], [
                    'code' => '11',
                    'libelle' => 'Aude',
                ],[
                    'code' => '12',
                    'libelle' => 'Aveyron',
                ], [
                    'code' => '13',
                    'libelle' => 'Bouches-du-Rhône',
                ], [
                    'code' => '14',
                    'libelle' => 'Calvados',
                ], [
                    'code' => '15',
                    'libelle' => 'Cantal',
                ], [
                    'code' => '16',
                    'libelle' => 'Charente',
                ], [
                    'code' => '17',
                    'libelle' => 'Charente-Maritime',
                ], [
                    'code' => '18',
                    'libelle' => 'Cher',
                ], [
                    'code' => '19',
                    'libelle' => 'Corrèze',
                ], [
                    'code' => '20',
                    'libelle' => 'Corse',
                ], [
                    'code' => '21',
                    'libelle' => 'Côte-d\'Or',
                ], [
                    'code' => '22',
                    'libelle' => 'Côtes-d\'Armor',
                ], [
                    'code' => '23',
                    'libelle' => 'Creuse',
                ], [
                    'code' => '24',
                    'libelle' => 'Dordogne',
                ], [
                    'code' => '25',
                    'libelle' => 'Doubs',
                ], [
                    'code' => '26',
                    'libelle' => 'Drôme',
                ], [
                    'code' => '27',
                    'libelle' => 'Eure',
                ], [
                    'code' => '28',
                    'libelle' => 'Eure-et-Loir',
                ], [
                    'code' => '29',
                    'libelle' => 'Finistère',
                ], [
                    'code' => '30',
                    'libelle' => 'Gard',
                ], [
                    'code' => '31',
                    'libelle' => 'Haute-Garonne',
                ], [
                    'code' => '32',
                    'libelle' => 'Gers',
                ], [
                    'code' => '33',
                    'libelle' => 'Gironde',
                ], [
                    'code' => '34',
                    'libelle' => 'Hérault',
                ], [
                    'code' => '35',
                    'libelle' => 'Ille-et-Vilaine',
                ], [
                    'code' => '36',
                    'libelle' => 'Indre',
                ], [
                    'code' => '37',
                    'libelle' => 'Indre-et-Loire',
                ], [
                    'code' => '38',
                    'libelle' => 'Isère',
                ], [
                    'code' => '39',
                    'libelle' => 'Jura',
                ], [
                    'code' => '40',
                    'libelle' => 'Landes',
                ], [
                    'code' => '41',
                    'libelle' => 'Loir-et-Cher',
                ], [
                    'code' => '42',
                    'libelle' => 'Loire',
                ], [
                    'code' => '43',
                    'libelle' => 'Haute-Loire',
                ], [
                    'code' => '44',
                    'libelle' => 'Loire-Atlantique',
                ], [
                    'code' => '45',
                    'libelle' => 'Loiret',
                ], [
                    'code' => '46',
                    'libelle' => 'Lot',
                ], [
                    'code' => '47',
                    'libelle' => 'Lot-et-Garonne',
                ], [
                    'code' => '48',
                    'libelle' => 'Lozère',
                ], [
                    'code' => '49',
                    'libelle' => 'Maine-et-Loire',
                ], [
                    'code' => '50',
                    'libelle' => 'Manche',
                ], [
                    'code' => '51',
                    'libelle' => 'Marne',
                ], [
                    'code' => '52',
                    'libelle' => 'Haute-Marne',
                ], [
                    'code' => '53',
                    'libelle' => 'Mayenne',
                ], [
                    'code' => '54',
                    'libelle' => 'Meurthe-et-Moselle',
                ], [
                    'code' => '55',
                    'libelle' => 'Meuse',
                ], [
                    'code' => '56',
                    'libelle' => 'Morbihan',
                ], [
                    'code' => '57',
                    'libelle' => 'Moselle',
                ], [
                    'code' => '58',
                    'libelle' => 'Nièvre',
                ], [
                    'code' => '59',
                    'libelle' => 'Nord',
                ], [
                    'code' => '60',
                    'libelle' => 'Oise',
                ], [
                    'code' => '61',
                    'libelle' => 'Orne',
                ], [
                    'code' => '62',
                    'libelle' => 'Pas-de-Calais',
                ], [
                    'code' => '63',
                    'libelle' => 'Puy-de-Dôme',
                ], [
                    'code' => '64',
                    'libelle' => 'Pyrénées-Atlantiques',
                ], [
                    'code' => '65',
                    'libelle' => 'Hautes-Pyrénées',
                ], [
                    'code' => '66',
                    'libelle' => 'Pyrénées-Orientales',
                ], [
                    'code' => '67',
                    'libelle' => 'Bas-Rhin',
                ], [
                    'code' => '68',
                    'libelle' => 'Haut-Rhin',
                ], [
                    'code' => '69',
                    'libelle' => 'Rhône',
                ], [
                    'code' => '70',
                    'libelle' => 'Haute-Saône',
                ], [
                    'code' => '71',
                    'libelle' => 'Saône-et-Loire',
                ], [
                    'code' => '72',
                    'libelle' => 'Sarthe',
                ], [
                    'code' => '73',
                    'libelle' => 'Savoie',
                ], [
                    'code' => '74',
                    'libelle' => 'Haute-Savoie',
                ], [
                    'code' => '75',
                    'libelle' => 'Paris',
                ], [
                    'code' => '76',
                    'libelle' => 'Seine-Maritime',
                ], [
                    'code' => '77',
                    'libelle' => 'Seine-et-Marne',
                ], [
                    'code' => '78',
                    'libelle' => 'Yvelines',
                ], [
                    'code' => '79',
                    'libelle' => 'Deux-Sèvres',
                ], [
                    'code' => '80',
                    'libelle' => 'Somme',
                ], [
                    'code' => '81',
                    'libelle' => 'Tarn',
                ], [
                    'code' => '82',
                    'libelle' => 'Tarn-et-Garonne',
                ], [
                    'code' => '83',
                    'libelle' => 'Var',
                ], [
                    'code' => '84',
                    'libelle' => 'Vaucluse',
                ], [
                    'code' => '85',
                    'libelle' => 'Vendée',
                ], [
                    'code' => '86',
                    'libelle' => 'Vienne',
                ], [
                    'code' => '87',
                    'libelle' => 'Haute-Vienne',
                ], [
                    'code' => '88',
                    'libelle' => 'Vosges',
                ], [
                    'code' => '89',
                    'libelle' => 'Yonne',
                ], [
                    'code' => '90',
                    'libelle' => 'Territoire de Belfort',
                ], [
                    'code' => '91',
                    'libelle' => 'Essonne',
                ], [
                    'code' => '92',
                    'libelle' => 'Hauts-de-Seine',
                ], [
                    'code' => '93',
                    'libelle' => 'Seine-Saint-Denis',
                ], [
                    'code' => '94',
                    'libelle' => 'Val-de-Marne',
                ], [
                    'code' => '95',
                    'libelle' => 'Val-d\'Oise',
                ], [
                    'code' => '971',
                    'libelle' => 'Guadeloupe',
                ], [
                    'code' => '973',
                    'libelle' => 'Guyane',
                ], [
                    'code' => '974',
                    'libelle' => 'Réunion',
                ], [
                    'code' => '972',
                    'libelle' => 'Martinique',
                ], [
                    'code' => '976',
                    'libelle' => 'Mayotte',
                ], [
                    'code' => '988',
                    'libelle' => 'Nouvelle Calédonie',
                ], [
                    'code' => '987',
                    'libelle' => 'Polynésie Française',
                ], [
                    'code' => '975',
                    'libelle' => 'St Pierre et Miquelon',
                ], [
                    'code' => '986',
                    'libelle' => 'Wallis et Futuna',
                ]
            ]
        ]
    ];

    public const PAYSADRESSES = [
        [
            'code' => 'XXXXXFRANCE',
            'libelle' => 'FRANCE',
        ]
    ];

    public const PAYSCRSCODE = [
        [
            'code' => '99303',
            'libelle' => 'AFRIQUE DU SUD',
        ], [
            'code' => '99125',
            'libelle' => 'ALBANIE',
        ], [
            'code' => '99109',
            'libelle' => 'ALLEMAGNE',
        ], [
            'code' => '99130',
            'libelle' => 'ANDORRE',
        ], [
            'code' => '99425',
            'libelle' => 'ANGUILLA',
        ], [
            'code' => '99441',
            'libelle' => 'ANTIGUE ET BARBUDES',
        ], [
            'code' => '99201',
            'libelle' => 'ARABIE SAOUDITE',
        ], [
            'code' => '99415',
            'libelle' => 'ARGENTINE',
        ], [
            'code' => '99135',
            'libelle' => 'ARUBA',
        ], [
            'code' => '99501',
            'libelle' => 'AUSTRALIE',
        ],[
            'code' => '99110',
            'libelle' => 'AUTRICHE',
        ], [
            'code' => '99253',
            'libelle' => 'AZERBAIJAN',
        ], [
            'code' => '99436',
            'libelle' => 'BAHAMAS',
        ], [
            'code' => '99249',
            'libelle' => 'BAHREIN',
        ], [
            'code' => '99434',
            'libelle' => 'BARBADE',
        ], [
            'code' => '99131',
            'libelle' => 'BELGIQUE',
        ], [
            'code' => '99429',
            'libelle' => 'BELIZE',
        ], [
            'code' => '99425',
            'libelle' => 'BERMUDES',
        ], [
            'code' => '99416',
            'libelle' => 'BRESIL',
        ], [
            'code' => '99225',
            'libelle' => 'BRUNEI DARUSSALAM',
        ], [
            'code' => '99111',
            'libelle' => 'BULGARIE',
        ], [
            'code' => '99401',
            'libelle' => 'CANADA',
        ], [
            'code' => '99417',
            'libelle' => 'CHILI',
        ], [
            'code' => '99216',
            'libelle' => 'CHINE',
        ], [
            'code' => '99254',
            'libelle' => 'CHYPRE',
        ], [
            'code' => '99419',
            'libelle' => 'COLOMBIE',
        ], [
            'code' => '99239',
            'libelle' => 'COREE DU SUD',
        ], [
            'code' => '99406',
            'libelle' => 'COSTA RICA',
        ], [
            'code' => '99119',
            'libelle' => 'CROATIE',
        ], [
            'code' => '99444',
            'libelle' => 'CURUçAO',
        ], [
            'code' => '99101',
            'libelle' => 'DANEMARK',
        ], [
            'code' => '99438',
            'libelle' => 'DOMINIQUE',
        ], [
            'code' => '99247',
            'libelle' => 'EMIRATS ARABES UNIS',
        ], [
            'code' => '99134',
            'libelle' => 'ESPAGNE',
        ], [
            'code' => '99106',
            'libelle' => 'ESTONIE',
        ], [
            'code' => '99404',
            'libelle' => 'ETATS UNIS',
        ], [
            'code' => '99105',
            'libelle' => 'FINLANDE',
        ], [
            'code' => '99329',
            'libelle' => 'GHANA',
        ], [
            'code' => '99133',
            'libelle' => 'GIBRALTAR',
        ], [
            'code' => '99126',
            'libelle' => 'GRECE',
        ], [
            'code' => '99435',
            'libelle' => 'GRENADE',
        ],[
            'code' => '99430',
            'libelle' => 'GROENLAND',
        ], [
            'code' => '99132',
            'libelle' => 'GUERNESEY',
        ], [
            'code' => '99230',
            'libelle' => 'HONG-KONG',
        ], [
            'code' => '99112',
            'libelle' => 'HONGRIE',
        ], [
            'code' => '99132',
            'libelle' => 'ILE DE MAN',
        ], [
            'code' => '99390',
            'libelle' => 'ILE MAURICE',
        ], [
            'code' => '99425',
            'libelle' => 'ILES CAIMANS',
        ], [
            'code' => '99502',
            'libelle' => 'ILES COOK',
        ], [
            'code' => '99101',
            'libelle' => 'ILES FEROE',
        ], [
            'code' => '99515',
            'libelle' => 'ILES MARSHALL',
        ], [
            'code' => '99425',
            'libelle' => 'ILES TURQUES-ET-CAIQUE',
        ], [
            'code' => '99425',
            'libelle' => 'ILES VIERGES BRITANIQUES',
        ], [
            'code' => '99223',
            'libelle' => 'INDE',
        ], [
            'code' => '99231',
            'libelle' => 'INDONESIE',
        ], [
            'code' => '99136',
            'libelle' => 'IRLANDE',
        ], [
            'code' => '99102',
            'libelle' => 'ISLANDE',
        ], [
            'code' => '99207',
            'libelle' => 'ISRAEL',
        ], [
            'code' => '99127',
            'libelle' => 'ITALIE',
        ], [
            'code' => '99217',
            'libelle' => 'JAPON',
        ], [
            'code' => '99132',
            'libelle' => 'JERSEY',
        ], [
            'code' => '99240',
            'libelle' => 'KOWEIT',
        ], [
            'code' => '99107',
            'libelle' => 'LETTONIE',
        ], [
            'code' => '99205',
            'libelle' => 'LIBAN',
        ], [
            'code' => '99113',
            'libelle' => 'LIECHTENSTEIN',
        ],[
            'code' => '99108',
            'libelle' => 'LITUANIE',
        ], [
            'code' => '99137',
            'libelle' => 'LUXEMBOURG',
        ], [
            'code' => '99232',
            'libelle' => 'MACAO',
        ], [
            'code' => '99227',
            'libelle' => 'MALAISIE',
        ], [
            'code' => '99144',
            'libelle' => 'MALTE',
        ], [
            'code' => '99405',
            'libelle' => 'MEXIQUE',
        ], [
            'code' => '99138',
            'libelle' => 'MONACO',
        ], [
            'code' => '99425',
            'libelle' => 'MONTSERRAT',
        ], [
            'code' => '99507',
            'libelle' => 'NAURU',
        ], [
            'code' => '99338',
            'libelle' => 'NIGERIA',
        ], [
            'code' => '99502',
            'libelle' => 'NIUE',
        ], [
            'code' => '99103',
            'libelle' => 'NORVEGE',
        ], [
            'code' => '99502',
            'libelle' => 'NOUVELLE-ZELANDE',
        ], [
            'code' => '99213',
            'libelle' => 'PAKISTAN',
        ], [
            'code' => '99135',
            'libelle' => 'PAYS-BAS',
        ], [
            'code' => '99122',
            'libelle' => 'POLOGNE',
        ], [
            'code' => '99139',
            'libelle' => 'PORTUGAL',
        ], [
            'code' => '99248',
            'libelle' => 'QUATAR',
        ], [
            'code' => '99117',
            'libelle' => 'REPUBLIQUE SLOVAQUE',
        ], [
            'code' => '99116',
            'libelle' => 'REPUBLIQUE TCHEQUE',
        ], [
            'code' => '99114',
            'libelle' => 'ROUMANIE',
        ], [
            'code' => '99132',
            'libelle' => 'ROYAUME-UNI',
        ], [
            'code' => '99123',
            'libelle' => 'RUSSIE',
        ], [
            'code' => '99445',
            'libelle' => 'SAINT MARTIN',
        ], [
            'code' => '99440',
            'libelle' => 'SAINT VINCENT ET LES GRENADINES',
        ], [
            'code' => '99442',
            'libelle' => 'SAINT-CHRISTOPHE-ET-NIEVES',
        ], [
            'code' => '99128',
            'libelle' => 'SAINT-MARIN',
        ], [
            'code' => '99439',
            'libelle' => 'SAINTE LUCIE',
        ], [
            'code' => '99505',
            'libelle' => 'SAMOA',
        ], [
            'code' => '99398',
            'libelle' => 'SEYCHELLES',
        ], [
            'code' => '99226',
            'libelle' => 'SINGAPOUR',
        ], [
            'code' => '99145',
            'libelle' => 'SLOVENIE',
        ], [
            'code' => '99104',
            'libelle' => 'SUEDE',
        ], [
            'code' => '99140',
            'libelle' => 'SUISSE',
        ], [
            'code' => '99433',
            'libelle' => 'TRINITE ET TOBAGO',
        ], [
            'code' => '99208',
            'libelle' => 'TURQUIE',
        ], [
            'code' => '99423',
            'libelle' => 'URUGUAY',
        ], [
            'code' => '99514',
            'libelle' => 'VANUATU',
        ]
    ];

    public const CIVILITES = [
        [
            'code' => 'MONSIEUR',
            'libelle' => 'M.',
        ], [
            'code' => 'MADAME',
            'libelle' => 'Mme.',
        ],
    ];

    public const PIECESIDENTITE = [
        [
            'code' => 'FE21',
            'libelle' => 'Carte Nationale d\'Identité (CNI]',
        ], [
            'code' => 'FE22',
            'libelle' => 'Passeport',
        ], [
            'code' => 'FE23',
            'libelle' => 'Nouveau permis de conduire',
        ],
    ];

    public const SECONDESPIECESIDENTITE = [
        [
            'code' => 'FE21',
            'libelle' => 'Carte Nationale d\'Identité (CNI]',
        ], [
            'code' => 'FE22',
            'libelle' => 'Passeport',
        ],[
            'code' => 'FE23',
            'libelle' => 'Nouveau permis de conduire',
        ], [
            'code' => 'FE25',
            'libelle' => 'Livret de famille',
        ], [
            'code' => 'FE26',
            'libelle' => 'Carte électorale française',
        ],[
            'code' => 'FE27',
            'libelle' => 'Acte de naissance',
        ], [
            'code' => 'FE30',
            'libelle' => 'Permis de conduire',
        ],
    ];
}

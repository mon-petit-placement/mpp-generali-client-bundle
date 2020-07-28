<?php


declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Subscription
 * @package Mpp\GeneraliClientBundle\Model
 */
class Subscription
{
    /**
     * STEPS
     */
    public const STEP_INITIATE = 'initiate';
    public const STEP_CHECK = 'check';
    public const STEP_CONFIRM = 'confirm';
    public const STEP_FINALIZE = 'finalize';

    public const STEPS_MAP = [
        SELF::STEP_INITIATE => "initier",
        SELF::STEP_CHECK => "verifier",
        SELF::STEP_CONFIRM => "confirmer",
        SELF::STEP_FINALIZE => "finaliser",
    ];

    public const AVAILABLE_STEPS = [
        SELF::STEP_INITIATE,
        SELF::STEP_CHECK,
        SELF::STEP_CONFIRM,
        SELF::STEP_FINALIZE,
    ];
    /**
     * PRODUCTS
     */
    public const PRODUCT_SUBSCRIPTION = 'subscription';
    public const PRODUCT_FREE_PAYMENT = 'free_payment';
    public const PRODUCT_SCHEDULED_FREE_PAYMENT = 'scheduled_free_payment';
    public const PRODUCT_ARBITRATION = 'arbitration';

    public const PRODUCTS_MAP = [
        self::PRODUCT_SUBSCRIPTION => 'souscription',
        self::PRODUCT_FREE_PAYMENT => 'versementLibre',
        self::PRODUCT_SCHEDULED_FREE_PAYMENT => 'versementsLibresProgrammes',
        self::PRODUCT_ARBITRATION => 'arbitrage',
    ];

    public const AVAILABLE_PRODUCTS = [
        self::PRODUCT_SUBSCRIPTION,
        self::PRODUCT_FREE_PAYMENT,
        self::PRODUCT_SCHEDULED_FREE_PAYMENT,
        self::PRODUCT_ARBITRATION,
    ];

    /**
     * CIVILITY
     */
    public const CIVILITY_MR = 'sir';
    public const CIVILITY_MME = 'madam';
    
    public const CIVILITY_MAP = [
        self::CIVILITY_MR => [
            'code' => 'MONSIEUR',
            'libelle' => 'M.',
        ],
        self::CIVILITY_MME => [
            'code' => 'MADAME',
            'libelle' => 'Mme.',
        ],
    ];
    public const AVAILABLE_CIVILITY = [
        self::CIVILITY_MR,
        self::CIVILITY_MME,
    ];
    
    /**
     * BENEFICIARY CLAUSES
     */
    public const BENEFICIARY_CLAUSE_A = 'clause_a';
    public const BENEFICIARY_CLAUSE_C = 'clause_c';
    public const BENEFICIARY_CLAUSE_E = 'clause_e';
    public const BENEFICIARY_CLAUSE_H = 'clause_h';
    public const BENEFICIARY_CLAUSE_M = 'clause_m';

    public const BENEFICIARY_CLAUSES_MAP = [
        self::BENEFICIARY_CLAUSE_A => [
            'code' => 'clause.A',
            'texte' => 'En cas de décès, je souhaite que le capital public constitué soit versé à une ou plusieurs autres personnes que je désigne de la façon la plus complète possible (Exemple : Nom, Prénom, Date et lieu de naissance, Adresse, Répartition en %] : ',
            'texteLibre' => true,
            'apresTexteLibre' => ', à défaut mes héritiers.',
        ],
        self::BENEFICIARY_CLAUSE_C => [
            'code' => 'clause.C',
            'texte' => 'Le conjoint ou le partenaire de PACS de l\'Assuré(e], à défaut les enfants de l\'Assuré(e], nés ou à naître, vivants ou représentés, par parts égales entre eux, à défaut les héritiers de l\'Assuré(e].',
            'texteLibre' => false,
        ],
        self::BENEFICIARY_CLAUSE_E => [
            'code' => 'clause.E',
            'texte' => 'Les enfants de l\'Assuré(e], nés ou à naître, vivants ou représentés par parts égales entre eux, à défaut les héritiers de l\'Assuré(e].',
            'texteLibre' => false,
        ],
        self::BENEFICIARY_CLAUSE_H => [
            'code' => 'clause.H',
            'texte' => 'Les héritiers de l\'Assuré(e].',
            'texteLibre' => false,
        ],
        self::BENEFICIARY_CLAUSE_M => [
            'code' => 'clause.M',
            'texte' => 'Ma clause bénéficiaire est trop longue (supérieure à 180 caractères] pour pouvoir être saisie sur le site. Je la saisirai manuscritement dans le formulaire prévu à cet effet qui est annexé à mon bulletin de souscription.',
            'texteLibre' => false,
        ],
    ];

    public const AVAILABLE_BENEFICIARY_CLAUSES = [
        self::BENEFICIARY_CLAUSE_A,
        self::BENEFICIARY_CLAUSE_C,
        self::BENEFICIARY_CLAUSE_E,
        self::BENEFICIARY_CLAUSE_H,
        self::BENEFICIARY_CLAUSE_M,
    ];

    /**
     * PAYMENT METHOD
     */
    public const PAYMENT_METHOD_DIRECT_DEBIT = 'direct_debit';
    public const PAYMENT_METHOD_TRANSFER = 'transfer';
    public const PAYMENT_METHOD_CHECK = 'check';

    public const PAYMENT_METHOD_MAP = [
        self::PAYMENT_METHOD_DIRECT_DEBIT => 'PRELEVEMENT',
        self::PAYMENT_METHOD_TRANSFER => 'VIREMENT',
        self::PAYMENT_METHOD_CHECK => 'CHEQUE',
    ];

    public const AVAILABLE_PAYMENT_METHOD = [
        self::PAYMENT_METHOD_DIRECT_DEBIT,
        self::PAYMENT_METHOD_TRANSFER,
        self::PAYMENT_METHOD_CHECK,
    ];

    /**
     * DURATION TYPE
     */
    public const DURATION_ENTIRE_LIFE = 'entire_life';
    public const DURATION_DEFERRED_CAPITAL = 'deferred_capital';

    public const DURATION_TYPE_MAP = [
        self::DURATION_ENTIRE_LIFE => [
            'typeDuree' => 'VIE_ENTIERE',
            'libelle' => 'VIE_ENTIERE',
            'dureeNecessaire' => false,
        ],
        self::DURATION_DEFERRED_CAPITAL => [
            'typeDuree' => 'CAPITAL_DIFFERE',
            'libelle' => 'CAPITAL_DIFFERE',
            'dureeNecessaire' => true,
            'dureeMin' => 8,
            'dureeMax' => 30,
        ],
    ];

    public const AVAILABLE_DURATION_TYPE = [
        self::DURATION_ENTIRE_LIFE,
        self::DURATION_DEFERRED_CAPITAL,
    ];

    /**
     * BANK DEBIT DAY
     */
    public const BANK_DEBIT_10_DAY = 'debit_10_day';

    public const BANK_DEBIT_MAP = [
        self::BANK_DEBIT_10_DAY => 10
    ];

    public const AVAILABLE_BANK_DEBIT = [
        self::BANK_DEBIT_10_DAY
    ];

    /**
     * TYPE OF OUTCOME
     */
    public const OUTCOME_TYPE_FIRST_DEATH = 'first_death';
    public const OUTCOME_TYPE_SECOND_DEATH = 'second_death';

    public const OUTCOME_TYPE_MAP = [
        self::OUTCOME_TYPE_FIRST_DEATH => [
            'code' => 'PREMIER_DECES',
            'libelle' => '1er décès',
        ],
        self::OUTCOME_TYPE_SECOND_DEATH => [
            'code' => 'SECOND_DECES',
            'libelle' => '2nd décès',
        ]
    ];

    public const AVAILABLE_OUTCOME_TYPE = [
        self::OUTCOME_TYPE_FIRST_DEATH,
        self::OUTCOME_TYPE_SECOND_DEATH,
    ];

    /**
     * PROFESSIONAL SITUATIONS
     */
    public const PROFESSIONAL_SITUATION_RETIRED = 'retired';
    public const PROFESSIONAL_SITUATION_EMPLOYED = 'employed';
    public const PROFESSIONAL_SITUATION_WITHOUT_ACTIVITY = 'without_activity';
    public const PROFESSIONAL_SITUATION_SELF_EMPLOYED= 'self_employed';

    public const PROFESSIONAL_SITUATION_MAP = [
        self::PROFESSIONAL_SITUATION_RETIRED => [
            'code' => 'RET',
            'libelle' => 'Retraité',
        ],
        self::PROFESSIONAL_SITUATION_EMPLOYED => [
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
        ],
        self::PROFESSIONAL_SITUATION_WITHOUT_ACTIVITY => [
            'code' => 'NPR',
            'libelle' => 'Sans activité',
        ],
        self::PROFESSIONAL_SITUATION_SELF_EMPLOYED => [
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
        ],
    ];

    public const AVAILABLE_PROFESSIONAL_SITUATION = [
        self::PROFESSIONAL_SITUATION_RETIRED,
        self::PROFESSIONAL_SITUATION_EMPLOYED,
        self::PROFESSIONAL_SITUATION_WITHOUT_ACTIVITY,
        self::PROFESSIONAL_SITUATION_SELF_EMPLOYED,
    ];

    /**
     * FAMIILY SITUATION
     */
    public const FAMILY_SITUATION_SINGLE = 'single';
    public const FAMILY_SITUATION_DIVORCED = 'divorced';
    public const FAMILY_SITUATION_MARRIED = 'married';
    public const FAMILY_SITUATION_CIVIL_PARTNERSHIP = 'civil_partnership';
    public const FAMILY_SITUATION_CIVIL_SEPARATED = 'civil_separated';
    public const FAMILY_SITUATION_COMMON_LAW = 'common_law';
    public const FAMILY_SITUATION_WIDOWED = 'widowed';

    public const FAMILY_SITUATION_MAP = [
        self::FAMILY_SITUATION_SINGLE => [
            'code' => '1',
            'libelle' => 'Célibataire',
        ],
        self::FAMILY_SITUATION_DIVORCED => [
            'code' => '3',
            'libelle' => 'Divorcé(e]',
        ],
        self::FAMILY_SITUATION_MARRIED => [
            'code' => '5',
            'libelle' => 'Marié(e] sous le régime',
        ],
        self::FAMILY_SITUATION_CIVIL_PARTNERSHIP => [
            'code' => '8',
            'libelle' => 'Pacsé(e]',
        ],
        self::FAMILY_SITUATION_CIVIL_SEPARATED => [
            'code' => '4',
            'libelle' => 'Séparé(e]',
        ],
        self::FAMILY_SITUATION_COMMON_LAW => [
            'code' => '7',
            'libelle' => 'Union libre',
        ],
        self::FAMILY_SITUATION_WIDOWED => [
            'code' => '2',
            'libelle' => 'Veuf(ve]',
        ],
    ];

    public const AVAILABLE_FAMILY_SITUATION = [
        self::FAMILY_SITUATION_SINGLE,
        self::FAMILY_SITUATION_DIVORCED,
        self::FAMILY_SITUATION_MARRIED,
        self::FAMILY_SITUATION_CIVIL_PARTNERSHIP,
        self::FAMILY_SITUATION_CIVIL_SEPARATED,
        self::FAMILY_SITUATION_COMMON_LAW,
        self::FAMILY_SITUATION_WIDOWED,
    ];

    /**
     * SLICE OF INCOME BRACKETS
     */
    public const INCOME_BRACKETS_SLICE_1 = 'slice_1';
    public const INCOME_BRACKETS_SLICE_2 = 'slice_2';
    public const INCOME_BRACKETS_SLICE_3 = 'slice_3';
    public const INCOME_BRACKETS_SLICE_4 = 'slice_4';
    public const INCOME_BRACKETS_SLICE_5 = 'slice_5';
    public const INCOME_BRACKETS_SLICE_6 = 'slice_6';
    public const INCOME_BRACKETS_SLICE_7 = 'slice_7';

    public const INCOME_BRACKETS_MAP = [
        self::INCOME_BRACKETS_SLICE_1 =>[
            'code' => '1',
            'libelle' => '0 à 25 000',
            'trancheMin' => 0,
            'trancheMax' => 25000,
        ],
        self::INCOME_BRACKETS_SLICE_2 =>[
            'code' => '2',
            'libelle' => '25 000 à 50 000',
            'trancheMin' => 25000,
            'trancheMax' => 50000,
        ],
        self::INCOME_BRACKETS_SLICE_3 =>[
            'code' => '3',
            'libelle' => '50 000 à 75 000',
            'trancheMin' => 50000,
            'trancheMax' => 75000,
        ],
        self::INCOME_BRACKETS_SLICE_4 => [
            'code' => '4',
            'libelle' => '75 000 à 100 000',
            'trancheMin' => 75000,
            'trancheMax' => 100000,
        ],
        self::INCOME_BRACKETS_SLICE_5 =>[
            'code' => '5',
            'libelle' => '100 000 à 150 000',
            'trancheMin' => 100000,
            'trancheMax' => 150000,
        ],
        self::INCOME_BRACKETS_SLICE_6 =>[
            'code' => '6',
            'libelle' => '150 000 à 300 000',
            'trancheMin' => 150000,
            'trancheMax' => 300000,
        ],
        self::INCOME_BRACKETS_SLICE_7 =>[
            'code' => '7',
            'libelle' => 'Plus de 300 000',
            'trancheMin' => 300000,
        ],
    ];

    public const AVAILABLE_INCOME_BRACKETS = [
        self::INCOME_BRACKETS_SLICE_1,
        self::INCOME_BRACKETS_SLICE_2,
        self::INCOME_BRACKETS_SLICE_3,
        self::INCOME_BRACKETS_SLICE_4,
        self::INCOME_BRACKETS_SLICE_5,
        self::INCOME_BRACKETS_SLICE_6,
        self::INCOME_BRACKETS_SLICE_7,
    ];

    /**
     * SLICE OF PERSONAL ASSETS
     */
    public const PERSONAL_ASSETS_SLICE_1  = 'slice_1';
    public const PERSONAL_ASSETS_SLICE_2  = 'slice_2';
    public const PERSONAL_ASSETS_SLICE_3  = 'slice_3';
    public const PERSONAL_ASSETS_SLICE_4  = 'slice_4';
    public const PERSONAL_ASSETS_SLICE_5  = 'slice_5';
    public const PERSONAL_ASSETS_SLICE_6  = 'slice_6';
    public const PERSONAL_ASSETS_SLICE_7  = 'slice_7';
    public const PERSONAL_ASSETS_SLICE_8  = 'slice_8';

    public const PERSONAL_ASSETS_MAP = [
        self::PERSONAL_ASSETS_SLICE_1 => [
            'code' => '1',
            'libelle' => '0 à 100 000',
            'trancheMin' => 0,
            'trancheMax' => 100000,
        ],
        self::PERSONAL_ASSETS_SLICE_2 => [
            'code' => '2',
            'libelle' => '100 000 à 300 000',
            'trancheMin' => 100000,
            'trancheMax' => 300000,
        ],
        self::PERSONAL_ASSETS_SLICE_3 => [
            'code' => '3',
            'libelle' => '300 000 à 500 000',
            'trancheMin' => 300000,
            'trancheMax' => 500000,
        ],
        self::PERSONAL_ASSETS_SLICE_4 =>  [
            'code' => '4',
            'libelle' => '500 000 à 1 000 000',
            'trancheMin' => 500000,
            'trancheMax' => 1000000,
        ],
        self::PERSONAL_ASSETS_SLICE_5 => [
            'code' => '5',
            'libelle' => '1 000 000 à 2 000 000',
            'trancheMin' => 1000000,
            'trancheMax' => 2000000,
        ],
        self::PERSONAL_ASSETS_SLICE_6 => [
            'code' => '6',
            'libelle' => '2 000 000 à 5 000 000',
            'trancheMin' => 2000000,
            'trancheMax' => 5000000,
        ],
        self::PERSONAL_ASSETS_SLICE_7  => [
            'code' => '7',
            'libelle' => '5 000 000 à 10 000 000',
            'trancheMin' => 5000000,
            'trancheMax' => 10000000,
        ],
        self::PERSONAL_ASSETS_SLICE_8 => [
            'code' => '8',
            'libelle' => 'Plus de 10 000 000',
            'trancheMin' => 10000000,
        ],
    ];

    public const AVAILABLE_PERSONAL_ASSETS = [
        self::PERSONAL_ASSETS_SLICE_1,
        self::PERSONAL_ASSETS_SLICE_2,
        self::PERSONAL_ASSETS_SLICE_3,
        self::PERSONAL_ASSETS_SLICE_4,
        self::PERSONAL_ASSETS_SLICE_5,
        self::PERSONAL_ASSETS_SLICE_6,
        self::PERSONAL_ASSETS_SLICE_7,
        self::PERSONAL_ASSETS_SLICE_8,
    ];

    /**
     * ORIGIN OF FUNDS
     */
    public const FUNDS_ORIGIN_INCOME = '1';
    public const FUNDS_ORIGIN_HERITAGE = '3';
    public const FUNDS_ORIGIN_DONATION = '4';
    public const FUNDS_ORIGIN_SALE_ESTATE_ASSETS = '5';
    public const FUNDS_ORIGIN_SALE_MOVABLE_ASSETS = '6';
    public const FUNDS_ORIGIN_SALE_PROFESSIONAL_ASSETS = '7';
    public const FUNDS_ORIGIN_SALE_OTHER_ASSETS = '8';
    public const FUNDS_ORIGIN_GAMBLING = '9';
    public const FUNDS_ORIGIN_OTHERS = '10';
    public const FUNDS_ORIGIN_SAVING = '11';
    public const FUNDS_ORIGIN_EMPLOYEE_SAVING = '12';
    public const FUNDS_ORIGIN_CONTRACT_CAPITAL = '13';
    public const FUNDS_ORIGIN_DIVIDEND_PAYMENT = '14';
    public const FUNDS_ORIGIN_ASSOCIATED_CURRENT_ACCOUNT = '15';
    public const FUNDS_ORIGIN_ASSIGNMENT_WORK_ART = '16';

    public const FUNDS_ORIGIN_MAP = [
        self::FUNDS_ORIGIN_INCOME => [
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
        ],
        self::FUNDS_ORIGIN_HERITAGE => [
            'code' => '3',
            'libelle' => 'Héritage',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_DONATION => [
            'code' => '4',
            'libelle' => 'Donation',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_SALE_ESTATE_ASSETS => [
            'code' => '5',
            'libelle' => 'Cession d\'actifs immobiliers',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_SALE_MOVABLE_ASSETS => [
            'code' => '6',
            'libelle' => 'Cession d\'actifs mobiliers',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_SALE_PROFESSIONAL_ASSETS => [
            'code' => '7',
            'libelle' => 'Cession d\'actifs professionnel',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_SALE_OTHER_ASSETS => [
            'code' => '8',
            'libelle' => 'Cession d\'actifs autres',
            'dateNecessaire' => true,
            'commentaireNecessaire' => true,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_GAMBLING => [
            'code' => '9',
            'libelle' => 'Gains au jeu',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => true,
        ],
        self::FUNDS_ORIGIN_OTHERS => [
            'code' => '10',
            'libelle' => 'Autres',
            'dateNecessaire' => true,
            'commentaireNecessaire' => true,
            'bloquantDemat' => true,
        ],
        self::FUNDS_ORIGIN_SAVING => [
            'code' => '11',
            'libelle' => 'Epargne (sur livret, PEE, PEA, etc.]',
            'dateNecessaire' => false,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_EMPLOYEE_SAVING => [
            'code' => '12',
            'libelle' => 'Epargne salariale et d\'entreprise',
            'dateNecessaire' => false,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_CONTRACT_CAPITAL => [
            'code' => '13',
            'libelle' => 'Capital de contrats (rachat, terme, bénéfice, etc.]',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_DIVIDEND_PAYMENT => [
            'code' => '14',
            'libelle' => 'Versement de dividendes',
            'dateNecessaire' => false,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_ASSOCIATED_CURRENT_ACCOUNT => [
            'code' => '15',
            'libelle' => 'Remboursement de compte courant d\'associé',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
        self::FUNDS_ORIGIN_ASSIGNMENT_WORK_ART => [
            'code' => '16',
            'libelle' => 'Cession d\'oeuvres d\'art',
            'dateNecessaire' => true,
            'commentaireNecessaire' => false,
            'bloquantDemat' => false,
        ],
    ];

    public const AVAILABLE_FUNDS_ORIGIN = [
        self::FUNDS_ORIGIN_INCOME,
        self::FUNDS_ORIGIN_HERITAGE,
        self::FUNDS_ORIGIN_DONATION,
        self::FUNDS_ORIGIN_SALE_ESTATE_ASSETS,
        self::FUNDS_ORIGIN_SALE_MOVABLE_ASSETS,
        self::FUNDS_ORIGIN_SALE_PROFESSIONAL_ASSETS,
        self::FUNDS_ORIGIN_SALE_OTHER_ASSETS,
        self::FUNDS_ORIGIN_GAMBLING,
        self::FUNDS_ORIGIN_OTHERS,
        self::FUNDS_ORIGIN_SAVING,
        self::FUNDS_ORIGIN_EMPLOYEE_SAVING,
        self::FUNDS_ORIGIN_CONTRACT_CAPITAL,
        self::FUNDS_ORIGIN_DIVIDEND_PAYMENT,
        self::FUNDS_ORIGIN_ASSOCIATED_CURRENT_ACCOUNT,
        self::FUNDS_ORIGIN_ASSIGNMENT_WORK_ART ,
    ];

    /**
     * CONTRACTOR LINK
     */
    public const CONTRACTOR_LINK_SPOUSES = '1';
    public const CONTRACTOR_LINK_OTHER = '2';

    public const CONTRACTOR_LINK_MAP = [
        CONTRACTOR_LINK_SPOUSES => [
            'code' => '1',
            'libelle' => 'Conjoint',
        ],
        CONTRACTOR_LINK_OTHER => [
            'code' => '2',
            'libelle' => 'Autre',
        ]
    ];
    public const AVAILABLE_CONTRACTOR_LINK = [
        CONTRACTOR_LINK_SPOUSES,
        CONTRACTOR_LINK_OTHER
    ];

    /**
     * PPE FUNCTIONS
     */
    public const FUNCTION_PPE_HEAD_STATE = '1';
    public const FUNCTION_PPE_MEMBER_PARLIAMENT = '2';
    public const FUNCTION_PPE_MEMBER_SUPREME_COURT = '3';
    public const FUNCTION_PPE_MEMBER_COURT_AUDITORS = '4';
    public const FUNCTION_PPE_BANK_DIRECTOR = '5';
    public const FUNCTION_PPE_AMBASSADOR = '6';
    public const FUNCTION_PPE_ARMY_OFFICER = '7';
    public const FUNCTION_PPE_ADMINISTRATIVE_MEMBER = '8';
    public const FUNCTION_PPE_INTERNATIONAL_PUBLIC_INSTITUTION_DIRECTOR = '9';

    public const FUNCTION_PPE_MAP = [
        FUNCTION_PPE_HEAD_STATE => [
            'code' => '1',
            'libelle' => 'Chef d\'Etat, chef de gouvernement, membre d\'un gouvernement national ou de la Commission Européenne',
        ],
        FUNCTION_PPE_MEMBER_PARLIAMENT =>  [
            'code' => '2',
            'libelle' => 'Membre d\'une assemblée parlementaire nationale ou du Parlement européen',
        ],
        FUNCTION_PPE_MEMBER_SUPREME_COURT => [
        'code' => '3',
            'libelle' => 'Membre d\'une cour suprême, d\'une cour public constitutionnelle ou d\'une autre haute juridiction dont les décisions ne sont pas, sauf cirpublic constances exceptionnelles, susceptibles de recours',
        ],
        FUNCTION_PPE_MEMBER_COURT_AUDITORS => [
            'code' => '4',
            'libelle' => 'Membre d\'une cour des comptes',
        ],
        FUNCTION_PPE_BANK_DIRECTOR => [
            'code' => '5',
            'libelle' => 'Dirigeant ou membre de l\'organe de direction d\'une banque centrale',
        ],
        FUNCTION_PPE_AMBASSADOR => [
            'code' => '6',
            'libelle' => 'Ambassadeur, chargé d\'affaires, consul général et consul de carrière',
        ],
        FUNCTION_PPE_ARMY_OFFICER => [
            'code' => '7',
            'libelle' => 'Officier général ou officier supérieur assurant le commandement d\'une armée',
        ],
        FUNCTION_PPE_ADMINISTRATIVE_MEMBER => [
            'code' => '8',
            'libelle' => 'Membre d\'un organe d\'administration, de direction ou de surveillance d\'une entreprise publique',
        ],
        FUNCTION_PPE_INTERNATIONAL_PUBLIC_INSTITUTION_DIRECTOR => [
            'code' => '9',
            'libelle' => 'Dirigeant d\'une institution internationale publique créée par un traité',
        ]
    ];

    public const AVAILABLE_FUNCTION_PPE = [
        FUNCTION_PPE_HEAD_STATE,
        FUNCTION_PPE_MEMBER_PARLIAMENT,
        FUNCTION_PPE_MEMBER_SUPREME_COURT,
        FUNCTION_PPE_MEMBER_COURT_AUDITORS,
        FUNCTION_PPE_BANK_DIRECTOR,
        FUNCTION_PPE_AMBASSADOR,
        FUNCTION_PPE_ARMY_OFFICER,
        FUNCTION_PPE_ADMINISTRATIVE_MEMBER,
        FUNCTION_PPE_INTERNATIONAL_PUBLIC_INSTITUTION_DIRECTOR,
    ];

    /**
     * PPE CONTRACTOR LINK
     */
    public const PPE_CONTRACTOR_LINK_NOTORIOUS_SPOUSE = '1';
    public const PPE_CONTRACTOR_LINK_FOREIGN_PARTNERSHIP_CONTRACT = '2';
    public const PPE_CONTRACTOR_LINK_FOREIGN_DIRECT_LINE = '3';
    public const PPE_CONTRACTOR_LINK_BENEFICIAL_OWNER = '4';
    public const PPE_CONTRACTOR_LINK_BUSINESS_TIES = '5';

    public const PPE_CONTRACTOR_LINK_MAP = [
         PPE_CONTRACTOR_LINK_NOTORIOUS_SPOUSE => [
             'code' => '1',
             'libelle' => 'Le conjoint ou le concubin notoire',
         ],
        PPE_CONTRACTOR_LINK_FOREIGN_PARTNERSHIP_CONTRACT => [
            'code' => '2',
            'libelle' => 'Le partenaire lié par un pacte civil de solidarité ou par un contrat de partenariat enregistré en vertu d\'une loi étrangère',
        ],
        PPE_CONTRACTOR_LINK_FOREIGN_DIRECT_LINE => [
            'code' => '3',
            'libelle' => 'En ligne directe, les ascendants, descendants et alliés, au premier degré, ainsi que leur conjoint, leur partenaire lié par un pacte civil de solidarité ou par un contrat de partenariat enregistré en vertu d\'une loi étrangère',
        ],
        PPE_CONTRACTOR_LINK_BENEFICIAL_OWNER => [
            'code' => '4',
            'libelle' => 'Toute personne physique identifiée comme étant le bénéficiaire effectif d\'une personne morale conjointement avec ce client ;',
        ],
        PPE_CONTRACTOR_LINK_BUSINESS_TIES => [
            'code' => '5',
            'libelle' => 'Toute personne physique connue comme entretenant des liens d\'affaires étroits avec ce client',
        ]
    ];
    public const AVAILABLE_PPE_CONTRACTOR_LINK = [
        PPE_CONTRACTOR_LINK_NOTORIOUS_SPOUSE,
        PPE_CONTRACTOR_LINK_FOREIGN_PARTNERSHIP_CONTRACT,
        PPE_CONTRACTOR_LINK_FOREIGN_DIRECT_LINE,
        PPE_CONTRACTOR_LINK_BENEFICIAL_OWNER,
        PPE_CONTRACTOR_LINK_BUSINESS_TIES
    ];

    /**
     * PAYMENT OBJECTIVES
     */
    public const PAYMENT_OBJECTIVE_INHERITANCE_TRANSMISSION = '1';
    public const PAYMENT_OBJECTIVE_GUARANTEE_INSTRUMENT = '2';
    public const PAYMENT_OBJECTIVE_FUTUR_ADDITIONAL_INCOME = '3';
    public const PAYMENT_OBJECTIVE_IMMEDIATE_ADDITIONAL_INCOME = '4';
    public const PAYMENT_OBJECTIVE_FUTUR_PROJECT_FINANCING = '5';
    public const PAYMENT_OBJECTIVE_OTHERS = '6';
    public const PAYMENT_OBJECTIVE_BUILD_CAPITAL  = '7';

    public const PAYMENT_OBJECTIVE_MAP = [
        self::PAYMENT_OBJECTIVE_INHERITANCE_TRANSMISSION => [
            'code' => '1',
            'libelle' => 'Transmettre un capital à mes héritiers ou à des tiers',
        ],
        self::PAYMENT_OBJECTIVE_GUARANTEE_INSTRUMENT =>   [
            'code' => '2',
            'libelle' => 'Utiliser le contrat comme un instrument de garantie',
        ],
        self::PAYMENT_OBJECTIVE_FUTUR_ADDITIONAL_INCOME => [
            'code' => '3',
            'libelle' => 'Disposer de revenus complémentaires futurs (retraite]',
        ],
        self::PAYMENT_OBJECTIVE_IMMEDIATE_ADDITIONAL_INCOME => [
            'code' => '4',
            'libelle' => 'Disposer de revenus complémentaires immédiats',
        ],
        self::PAYMENT_OBJECTIVE_FUTUR_PROJECT_FINANCING => [
            'code' => '5',
            'libelle' => 'Financer un projet futur',
        ],
        self::PAYMENT_OBJECTIVE_OTHERS => [
            'code' => '6',
            'libelle' => 'Autres',
        ],
        self::PAYMENT_OBJECTIVE_BUILD_CAPITAL => [
            'code' => '7',
            'libelle' => 'public constituer un capital',
        ],
    ];

    public const AVAILABLE_PAYMENT_OBJECTIVE = [
        self::PAYMENT_OBJECTIVE_INHERITANCE_TRANSMISSION,
        self::PAYMENT_OBJECTIVE_GUARANTEE_INSTRUMENT,
        self::PAYMENT_OBJECTIVE_FUTUR_ADDITIONAL_INCOME,
        self::PAYMENT_OBJECTIVE_IMMEDIATE_ADDITIONAL_INCOME,
        self::PAYMENT_OBJECTIVE_FUTUR_PROJECT_FINANCING,
        self::PAYMENT_OBJECTIVE_OTHERS,
        self::PAYMENT_OBJECTIVE_BUILD_CAPITAL,
    ];

    /**
     * NAF CODE
     */
    public const CODE_NAF_AGRICULTURE_FORESTRY_FISHING = '1';
    public const CODE_NAF_EXTRACTIVE_INDUSTRY = '2';
    public const CODE_NAF_MANUFACTURING_INDUSTRY = '3';
    public const CODE_NAF_ELECTRICITY_GAS_AIR_MANAGEMENT = '4';
    public const CODE_NAF_WATER_WASTE_MANAGEMENT = '5';
    public const CODE_NAF_PUBLIC_CONSTRUCTION = '6';
    public const CODE_NAF_AUTO_MOTO_INDUSTRY = '7';
    public const CODE_NAF_TRANSPORT_STORAGE = '8';
    public const CODE_NAF_HOTEL_RESTAURANT = '9';
    public const CODE_NAF_INFORMATION_COMMUNICATION = '10';
    public const CODE_NAF_FINANCIAL_INSURANCE = '11';
    public const CODE_NAF_REAL_ESTATE= '12';
    public const CODE_NAF_SCIENTIFIC_TECHNICAL= '13';
    public const CODE_NAF_ADMINISTRATIVE_SUPPORT = '14';
    public const CODE_NAF_PUBLIC_ADMINISTRATIVE = '15';
    public const CODE_NAF_EDUCATION = '16';
    public const CODE_NAF_HEALTH_SOCIAL = '17';
    public const CODE_NAF_ART_ENTERTAINMENT = '18';
    public const CODE_NAF_OTHER_SERVICE = '19';
    public const CODE_NAF_EMPLOYERS_HOUSEHOLD = '20';
    public const CODE_NAF_EXTRA_TERRITORIAL = '21';
    public const CODE_NAF_UNDEFINED = '22';

    public const NAF_CODE_MAP = [
        self::CODE_NAF_AGRICULTURE_FORESTRY_FISHING =>[
            'code' => '1',
            'libelle' => 'Agriculture, sylviculture et pêche',
           ],
        self::CODE_NAF_EXTRACTIVE_INDUSTRY =>[
            'code' => '2',
            'libelle' => 'Industries extractives',
        ],
        self::CODE_NAF_MANUFACTURING_INDUSTRY =>[
            'code' => '3',
            'libelle' => 'Industrie manufacturière',
        ],
        self::CODE_NAF_ELECTRICITY_GAS_AIR_MANAGEMENT =>[
            'code' => '4',
            'libelle' => 'Production et distribution d\'électricité de gaz de vapeur et d\'air conditionné',
        ],
        self::CODE_NAF_WATER_WASTE_MANAGEMENT =>[
            'code' => '5',
            'libelle' => 'Production et distribution d\'eau , assainissement gestion des déchets et dépollution',
        ],
        self::CODE_NAF_PUBLIC_CONSTRUCTION =>[
            'code' => '6',
            'libelle' => 'public construction',
        ],
        self::CODE_NAF_AUTO_MOTO_INDUSTRY =>[
            'code' => '7',
            'libelle' => 'commerce, réparation d\'automobile et de motocycles',
        ],
        self::CODE_NAF_TRANSPORT_STORAGE =>[
            'code' => '8',
            'libelle' => 'Transports et entreposage',
        ],
        self::CODE_NAF_HOTEL_RESTAURANT =>[
            'code' => '9',
            'libelle' => 'Hébergement et restauration',
        ],
        self::CODE_NAF_INFORMATION_COMMUNICATION =>[
            'code' => '10',
            'libelle' => 'Information et communication',
        ],
        self::CODE_NAF_FINANCIAL_INSURANCE => [
        'code' => '11',
        'libelle' => 'Activités financières et d\'assurance',
        ],
        self::CODE_NAF_REAL_ESTATE=>[
        'code' => '12',
        'libelle' => 'Activités immobilières',
        ],
        self::CODE_NAF_SCIENTIFIC_TECHNICAL=>[
        'code' => '13',
        'libelle' => 'Activités spécialisées, scientifiques et techniques',
        ],
        self::CODE_NAF_ADMINISTRATIVE_SUPPORT =>[
        'code' => '14',
        'libelle' => 'Activités de services administratifs et de soutien',
        ],
        self::CODE_NAF_PUBLIC_ADMINISTRATIVE =>[
        'code' => '15',
        'libelle' => 'Administration publique',
        ],
        self::CODE_NAF_EDUCATION =>[
            'code' => '16',
            'libelle' => 'Enseignement',
        ],
        self::CODE_NAF_HEALTH_SOCIAL =>[
            'code' => '17',
            'libelle' => 'Santé humaine et action sociale',
        ],
        self::CODE_NAF_ART_ENTERTAINMENT =>[
            'code' => '18',
            'libelle' => 'Arts, spectacles et activités récréatives',
        ],
        self::CODE_NAF_OTHER_SERVICE =>[
            'code' => '19',
            'libelle' => 'Autres activités de services',
        ],
        self::CODE_NAF_EMPLOYERS_HOUSEHOLD =>[
        'code' => '20',
        'libelle' => 'Activités des ménages en tant qu\'employeurs',
        ],
        self::CODE_NAF_EXTRA_TERRITORIAL =>[
        'code' => '21',
        'libelle' => 'Activités extra-territoriales',
        ],
        self::CODE_NAF_UNDEFINED =>[
            'code' => '22',
            'libelle' => 'Non défini',
        ],
    ];

    public const AVAILABLE_NAF_CODE = [
        self::CODE_NAF_AGRICULTURE_FORESTRY_FISHING,
        self::CODE_NAF_EXTRACTIVE_INDUSTRY,
        self::CODE_NAF_MANUFACTURING_INDUSTRY,
        self::CODE_NAF_ELECTRICITY_GAS_AIR_MANAGEMENT,
        self::CODE_NAF_WATER_WASTE_MANAGEMENT,
        self::CODE_NAF_PUBLIC_CONSTRUCTION,
        self::CODE_NAF_AUTO_MOTO_INDUSTRY,
        self::CODE_NAF_TRANSPORT_STORAGE,
        self::CODE_NAF_HOTEL_RESTAURANT,
        self::CODE_NAF_INFORMATION_COMMUNICATION,
        self::CODE_NAF_FINANCIAL_INSURANCE,
        self::CODE_NAF_REAL_ESTATE,
        self::CODE_NAF_SCIENTIFIC_TECHNICAL,
        self::CODE_NAF_ADMINISTRATIVE_SUPPORT,
        self::CODE_NAF_PUBLIC_ADMINISTRATIVE,
        self::CODE_NAF_EDUCATION,
        self::CODE_NAF_HEALTH_SOCIAL,
        self::CODE_NAF_ART_ENTERTAINMENT,
        self::CODE_NAF_OTHER_SERVICE,
        self::CODE_NAF_EMPLOYERS_HOUSEHOLD,
        self::CODE_NAF_EXTRA_TERRITORIAL,
        self::CODE_NAF_UNDEFINED,
    ];

    /**
     * CSPS CODE
     */
    public const CSPS_CODE_NOT_SPECIFIED  = '0';
    public const CSPS_CODE_FARMER  = '32';
    public const CSPS_CODE_ARTISANS  = '33';
    public const CSPS_CODE_TRADERS_ASSIMILATED = '34';
    public const CSPS_CODE_MANAGER_MORE_10_EMPLOYEES = '35';
    public const CSPS_CODE_LIBERAL_ASSIMILATED = '36';
    public const CSPS_CODE_SALE_ADMINISTRATIVE_INTERMEDIARY_COMPANY = '37';
    public const CSPS_CODE_TECHNICIANS = '38';
    public const CSPS_CODE_SUPERVISOR = '39';
    public const CSPS_CODE_ADMINISTRATIVE_EMPLOYEE = '40';
    public const CSPS_CODE_COMMERCIAL_EMPLOYEE = '41';
    public const CSPS_CODE_PERSONAL_SERVICE_EMPLOYE = '42';
    public const CSPS_CODE_SKILLED_WORKER = '43';
    public const CSPS_CODE_UNSKILLED_WORKER = '44';
    public const CSPS_CODE_AGRICULTURAL_WORKER = '45';
    public const CSPS_CODE_PUBLIC_SERVICE_EXECUTIVE = '52';
    public const CSPS_CODE_PPROFESSOR_SCIENTIFIC_PROFESSION = '53';
    public const CSPS_CODE_INFORMATION_ART_ENTERTAINMENT = '54';
    public const CSPS_CODE_EXECUTIVES_SALES = '55';
    public const CSPS_CODE_SCHOOL_TEACHER = '56';
    public const CSPS_CODE_HEALTH_SOCIAL_INTERMEDIARY = '57';
    public const CSPS_CODE_RELIGIOUS = '58';
    public const CSPS_CODE_PUBLIC_SERVICE_INTERMEDIARY_PROFESSION = '59';
    public const CSPS_CODE_CIVILIAN_EMPLOYEE_CIVIL_SERVANTS = '60';
    public const CSPS_CODE_POLICE_MILITARY = '61';
    public const CSPS_CODE_ENGINEER_TECHNICAL_EXECUTIVE = '63';


    public const CSPS_CODE_MAP = [
        self::CSPS_CODE_NOT_SPECIFIED => [
            'code' => '0',
            'libelle' => 'Non renseigné',
        ],
        self::CSPS_CODE_FARMER =>[
            'code' => '32',
            'libelle' => 'Agriculteurs exploitants',
        ],
        self::CSPS_CODE_ARTISANS => [
            'code' => '33',
            'libelle' => 'Artisans',
        ],
        self::CSPS_CODE_TRADERS_ASSIMILATED=> [
            'code' => '34',
            'libelle' => 'Commerçants et assimilés',
        ],
        self::CSPS_CODE_MANAGER_MORE_10_EMPLOYEES=> [
            'code' => '35',
            'libelle' => 'Chefs d\'entreprise de 10 salariés ou plus',
        ],
        self::CSPS_CODE_LIBERAL_ASSIMILATED=> [
            'code' => '36',
            'libelle' => 'Professions libérales et assimilés',
        ],
        self::CSPS_CODE_SALE_ADMINISTRATIVE_INTERMEDIARY_COMPANY=> [
            'code' => '37',
            'libelle' => 'Professions intermédiaires administratives et commerciales des entreprises',
        ],
        self::CSPS_CODE_TECHNICIANS=>  [
            'code' => '38',
            'libelle' => 'Techniciens',
        ],
        self::CSPS_CODE_SUPERVISOR=> [
            'code' => '39',
            'libelle' => 'Contremaîtres, agents de maîtrise',
        ],
        self::CSPS_CODE_ADMINISTRATIVE_EMPLOYEE => [
            'code' => '40',
            'libelle' => 'Employés administratifs d\'entreprise',
        ],
        self::CSPS_CODE_COMMERCIAL_EMPLOYEE=> [
            'code' => '41',
            'libelle' => 'Employés de commerce',
        ],
        self::CSPS_CODE_PERSONAL_SERVICE_EMPLOYE=> [
            'code' => '42',
            'libelle' => 'Personnels des services directs aux particuliers',
        ],
        self::CSPS_CODE_SKILLED_WORKER=> [
            'code' => '43',
            'libelle' => 'Ouvriers qualifiés',
        ],
        self::CSPS_CODE_UNSKILLED_WORKER=> [
            'code' => '44',
            'libelle' => 'Ouvriers non qualifiés',
        ],
        self::CSPS_CODE_AGRICULTURAL_WORKER=> [
            'code' => '45',
            'libelle' => 'Ouvriers agricoles',
        ],
        self::CSPS_CODE_PUBLIC_SERVICE_EXECUTIVE=> [
            'code' => '52',
            'libelle' => 'Cadres de la fonction publique',
        ],
        self::CSPS_CODE_PPROFESSOR_SCIENTIFIC_PROFESSION=> [
            'code' => '53',
            'libelle' => 'Professeurs, professions scientifiques',
        ],
        self::CSPS_CODE_INFORMATION_ART_ENTERTAINMENT=> [
            'code' => '54',
            'libelle' => 'Professions de l\'information, des arts et des spectacles',
        ],
        self::CSPS_CODE_EXECUTIVES_SALES=> [
            'code' => '55',
            'libelle' => 'Cadres administratifs et commerciaux d\'entreprise',
        ],
        self::CSPS_CODE_SCHOOL_TEACHER=> [
            'code' => '56',
            'libelle' => 'Professeurs des écoles, instituteurs et assimilés',
        ],
        self::CSPS_CODE_HEALTH_SOCIAL_INTERMEDIARY => [
            'code' => '57',
            'libelle' => 'Professions intermédiaires de la santé et du travail social',
        ],
        self::CSPS_CODE_RELIGIOUS=> [
            'code' => '58',
            'libelle' => 'Clergé, religieux',
        ],
        self::CSPS_CODE_PUBLIC_SERVICE_INTERMEDIARY_PROFESSION=> [
            'code' => '59',
            'libelle' => 'Professions intermédiaires administratives de la fonction publique',
        ],
        self::CSPS_CODE_CIVILIAN_EMPLOYEE_CIVIL_SERVANTS => [
            'code' => '60',
            'libelle' => 'Employés civils et agents de service de la fonction publique',
        ],
        self::CSPS_CODE_POLICE_MILITARY=> [
            'code' => '61',
            'libelle' => 'Policiers et militaires',
        ],
        self::CSPS_CODE_ENGINEER_TECHNICAL_EXECUTIVE=> [
            'code' => '63',
            'libelle' => 'Ingénieurs et cadres techniques d\'entreprise',
        ],
    ];

    public const AVAILABLE_CSPS_CODE = [
        self::CSPS_CODE_NOT_SPECIFIED,
        self::CSPS_CODE_FARMER,
        self::CSPS_CODE_ARTISANS,
        self::CSPS_CODE_TRADERS_ASSIMILATED,
        self::CSPS_CODE_MANAGER_MORE_10_EMPLOYEES,
        self::CSPS_CODE_LIBERAL_ASSIMILATED,
        self::CSPS_CODE_SALE_ADMINISTRATIVE_INTERMEDIARY_COMPANY,
        self::CSPS_CODE_TECHNICIANS,
        self::CSPS_CODE_SUPERVISOR,
        self::CSPS_CODE_ADMINISTRATIVE_EMPLOYEE,
        self::CSPS_CODE_COMMERCIAL_EMPLOYEE,
        self::CSPS_CODE_PERSONAL_SERVICE_EMPLOYE,
        self::CSPS_CODE_SKILLED_WORKER,
        self::CSPS_CODE_UNSKILLED_WORKER,
        self::CSPS_CODE_AGRICULTURAL_WORKER,
        self::CSPS_CODE_PUBLIC_SERVICE_EXECUTIVE,
        self::CSPS_CODE_PPROFESSOR_SCIENTIFIC_PROFESSION,
        self::CSPS_CODE_INFORMATION_ART_ENTERTAINMENT,
        self::CSPS_CODE_EXECUTIVES_SALES,
        self::CSPS_CODE_SCHOOL_TEACHER,
        self::CSPS_CODE_HEALTH_SOCIAL_INTERMEDIARY,
        self::CSPS_CODE_RELIGIOUS,
        self::CSPS_CODE_PUBLIC_SERVICE_INTERMEDIARY_PROFESSION,
        self::CSPS_CODE_CIVILIAN_EMPLOYEE_CIVIL_SERVANTS,
        self::CSPS_CODE_POLICE_MILITARY,
        self::CSPS_CODE_ENGINEER_TECHNICAL_EXECUTIVE,
    ];

    public const FISCALITY_RESIDENCE_COUNTRY_FRANCE = 'france';
    
    public const AVAILABLE_FISCALITY_RESIDENCE_COUNTRY = [
        self::FISCALITY_RESIDENCE_COUNTRY_FRANCE,
    ]; 
    public const FISCALITY_RESIDENCE_COUNTRY_MAP = [
        self::FISCALITY_RESIDENCE_COUNTRY_FRANCE => [
            'code' => 'XXXXXFRANCE',
            'libelle' => 'FRANCE',
        ],
    ];

    /**
     * MATRIMONIAL REGIMES
     */
    public const MATRIMONIAL_REGIME_LEGAL_COMMUNITY = 'legal_community';
    public const MATRIMONIAL_REGIME_REDUCED_ACQUESTS_COMMUNITY = 'reduced_acquest_community';
    public const MATRIMONIAL_REGIME_CONVENTIONAL_COMMUNITY = 'conventional_community';
    public const MATRIMONIAL_REGIME_UNIVERSAL_COMMUNITY = 'universal_community';
    public const MATRIMONIAL_REGIME_PROPERTY_SEPARATION = 'property_separation';
    public const MATRIMONIAL_REGIME_PARTICIPATION_ACQUISITION = 'participation_acquisition';
    public const MATRIMONIAL_REGIME_FURNITURE_ACQUEST_COMMUNITY = 'furniture_acquest_community';
    public const MATRIMONIAL_REGIME_OTHER = 'other';

    public const AVAILABLE_MATRIMONIAL_REGIME = [
        self::MATRIMONIAL_REGIME_LEGAL_COMMUNITY,
        self::MATRIMONIAL_REGIME_REDUCED_ACQUESTS_COMMUNITY,
        self::MATRIMONIAL_REGIME_CONVENTIONAL_COMMUNITY,
        self::MATRIMONIAL_REGIME_UNIVERSAL_COMMUNITY,
        self::MATRIMONIAL_REGIME_PROPERTY_SEPARATION,
        self::MATRIMONIAL_REGIME_PARTICIPATION_ACQUISITION,
        self::MATRIMONIAL_REGIME_FURNITURE_ACQUEST_COMMUNITY,
        self::MATRIMONIAL_REGIME_OTHER,
    ];

    public const MATRIMONIAL_REGIME_MAP = [
        self::MATRIMONIAL_REGIME_LEGAL_COMMUNITY => [
            'code' => '1',
            'libelle' => 'Communauté légale',
        ],
        self::MATRIMONIAL_REGIME_REDUCED_ACQUESTS_COMMUNITY => [
            'code' => '2',
            'libelle' => 'Communauté réduite aux acquêts',
        ],
        self::MATRIMONIAL_REGIME_CONVENTIONAL_COMMUNITY => [
            'code' => '3',
            'libelle' => 'Communauté conventionnelle',
        ],
        self::MATRIMONIAL_REGIME_UNIVERSAL_COMMUNITY => [
            'code' => '4',
            'libelle' => 'Communauté universelle',
        ],
        self::MATRIMONIAL_REGIME_PROPERTY_SEPARATION => [
            'code' => '5',
            'libelle' => 'Séparation de biens',
        ],
        self::MATRIMONIAL_REGIME_PARTICIPATION_ACQUISITION => [
            'code' => '6',
            'libelle' => 'Participation aux acquêts',
        ],
        self::MATRIMONIAL_REGIME_FURNITURE_ACQUEST_COMMUNITY => [
            'code' => '7',
            'libelle' => 'Communauté de meubles et acquêts',
        ],
        self::MATRIMONIAL_REGIME_OTHER => [
            'code' => '9',
            'libelle' => 'Autre',
        ],
    ];

    /**
     * HERITAGE DISTRIBUTION
     */
    public const HERITAGE_DISTRIBUTION_REAL_ESTATE = 'real_estate';
    public const HERITAGE_DISTRIBUTION_SECURITIES_PORTFOLIO = 'securities_portfolio';
    public const HERITAGE_DISTRIBUTION_BANK_INVESTMENT = 'bank_investment';
    public const HERITAGE_DISTRIBUTION_LIFE_INSURANCE_CAPITALIZATION = 'life_insurance_capitalization';
    public const HERITAGE_DISTRIBUTION_OTHER = 'other';

    public const AVAILABLE_HERITAGE_DISTRIBUTION = [
        self::HERITAGE_DISTRIBUTION_REAL_ESTATE,
        self::HERITAGE_DISTRIBUTION_SECURITIES_PORTFOLIO,
        self::HERITAGE_DISTRIBUTION_BANK_INVESTMENT,
        self::HERITAGE_DISTRIBUTION_LIFE_INSURANCE_CAPITALIZATION,
        self::HERITAGE_DISTRIBUTION_OTHER,
    ];

    public const HERITAGE_DISTRIBUTION_MAP = [
        self::HERITAGE_DISTRIBUTION_REAL_ESTATE =>[
            'code' => '1',
            'libelle' => 'Immobilier',
        ],
        self::HERITAGE_DISTRIBUTION_SECURITIES_PORTFOLIO => [
            'code' => '2',
            'libelle' => 'Portefeuille de valeurs mobilières',
        ],
        self::HERITAGE_DISTRIBUTION_BANK_INVESTMENT => [
            'code' => '3',
            'libelle' => 'Placements bancaires',
        ],
        self::HERITAGE_DISTRIBUTION_LIFE_INSURANCE_CAPITALIZATION => [
            'code' => '4',
            'libelle' => 'Contrats assurance-vie/Capitalisation',
        ],
        self::HERITAGE_DISTRIBUTION_OTHER => [
            'code' => '6',
            'libelle' => 'Autre',
        ],
    ];


    /**
     * HERITAGE ORIGINS
     */
    public const HERITAGE_ORIGIN_SAVING_INCOME = 'epargne_revenus';
    public const HERITAGE_ORIGIN_INHERITANCE_DONATION = 'inheritance_donation';
    public const HERITAGE_ORIGIN_SALE_REAL_ESTATE_ASSET = 'sale_real_estate_asset';
    public const HERITAGE_ORIGIN_SALE_PROFESSIONNAL_ASSET = 'sale_professionnal_asset';
    public const HERITAGE_ORIGIN_GAMBLING_WINS = 'gambling_wins';
    public const HERITAGE_ORIGIN_OTHER = 'other';
    public const HERITAGE_ORIGIN_TRANSFER_MOVABLE_ASSETS = 'transfer_movable_assets';

    public const AVAILABLE_HERITAGE_ORIGIN = [
        self::HERITAGE_ORIGIN_SAVING_INCOME,
        self::HERITAGE_ORIGIN_INHERITANCE_DONATION,
        self::HERITAGE_ORIGIN_SALE_REAL_ESTATE_ASSET,
        self::HERITAGE_ORIGIN_SALE_PROFESSIONNAL_ASSET,
        self::HERITAGE_ORIGIN_GAMBLING_WINS,
        self::HERITAGE_ORIGIN_OTHER,
        self::HERITAGE_ORIGIN_TRANSFER_MOVABLE_ASSETS,
    ];

    public const HERITAGE_ORIGIN_MAP = [
        self::HERITAGE_ORIGIN_SAVING_INCOME => [
            'code' => '1',
            'libelle' => 'Epargne / Revenus',
        ],
        self::HERITAGE_ORIGIN_INHERITANCE_DONATION => [
            'code' => '2',
            'libelle' => 'Succession / Donation',
        ],
        self::HERITAGE_ORIGIN_SALE_REAL_ESTATE_ASSET => [
            'code' => '3',
            'libelle' => 'Cession d\'actifs immobiliers',
        ],
        self::HERITAGE_ORIGIN_SALE_PROFESSIONNAL_ASSET => [
            'code' => '4',
            'libelle' => 'Cession d\'actifs professionnel',
        ],
        self::HERITAGE_ORIGIN_GAMBLING_WINS => [
            'code' => '5',
            'libelle' => 'Gains au jeu',
        ],
        self::HERITAGE_ORIGIN_OTHER => [
            'code' => '6',
            'libelle' => 'Autre',
        ],
        self::HERITAGE_ORIGIN_TRANSFER_MOVABLE_ASSETS => [
            'code' => '7',
            'libelle' => 'Cession d\'actifs mobiliers',
        ],
    ];

    /**
     * LEGAL CAPACITY
     */
    public const LEGAL_CAPACITY_LEGAL_CAPABLE_MAJOR = 'legal_capable_major';
    public const LEGAL_CAPACITY_SIMPLE_CURATORSHIP = 'simple_curatorship';
    public const LEGAL_CAPACITY_REINFORCED_CURATORSHIP = 'reinforced_curatorship';
    public const LEGAL_CAPACITY_FAMILY_AUTHORIZATION = 'family_authorisation';
    public const LEGAL_CAPACITY_EMANCIPATED = 'emancipated';
    public const LEGALE_CAPACITY_FUTURE_PROTECTION_MANDATE = 'future_protection_mandate';
    public const LEGALE_CAPACITY_SAFEGUARDING_JUSTICE = 'safeguarding_justice';
    public const LEGALE_CAPACITY_UNDER_LEGALE_ADMINISTRATION = 'under_legale_administration';
    public const LEGALE_CAPACITY_UNDER_SUPERVISION_MAJOR = 'under_supervision_major';
    public const LEGALE_CAPACITY_UNDER_SUPERVISION_MINOR = 'under_supervision_minor';

    public const AVAILABLE_LEGAL_CAPACITY = [
        self::LEGAL_CAPACITY_LEGAL_CAPABLE_MAJOR,
        self::LEGAL_CAPACITY_SIMPLE_CURATORSHIP,
        self::LEGAL_CAPACITY_REINFORCED_CURATORSHIP,
        self::LEGAL_CAPACITY_FAMILY_AUTHORIZATION,
        self::LEGAL_CAPACITY_EMANCIPATED,
        self::LEGALE_CAPACITY_FUTURE_PROTECTION_MANDATE,
        self::LEGALE_CAPACITY_SAFEGUARDING_JUSTICE,
        self::LEGALE_CAPACITY_UNDER_LEGALE_ADMINISTRATION,
        self::LEGALE_CAPACITY_UNDER_SUPERVISION_MAJOR,
        self::LEGALE_CAPACITY_UNDER_SUPERVISION_MINOR,
    ];

    public const LEGAL_CAPACITY_MAP = [
        self::LEGAL_CAPACITY_LEGAL_CAPABLE_MAJOR => [
            'code' => '0',
            'libelle' => 'Majeur juridiquement capable',
        ],
        self::LEGAL_CAPACITY_SIMPLE_CURATORSHIP => [
            'code' => '3',
            'libelle' => 'Curatelle simple (Majeur]',
        ],
        self::LEGAL_CAPACITY_REINFORCED_CURATORSHIP => [
            'code' => '4',
            'libelle' => 'Curatelle renforcée  (Majeur]',
        ],
        self::LEGAL_CAPACITY_FAMILY_AUTHORIZATION => [
            'code' => '6',
            'libelle' => 'Habilitation familiale (Majeur]',
        ],
        self::LEGAL_CAPACITY_EMANCIPATED => [
            'code' => '9',
            'libelle' => 'Emancipé (Mineur]',
        ],
        self::LEGALE_CAPACITY_FUTURE_PROTECTION_MANDATE => [
            'code' => '11',
            'libelle' => 'Mandat de protection future (Majeur]',
        ],
        self::LEGALE_CAPACITY_SAFEGUARDING_JUSTICE => [
            'code' => '5',
            'libelle' => 'Sauvegarde de justice  (Majeur]',
        ],
        self::LEGALE_CAPACITY_UNDER_LEGALE_ADMINISTRATION => [
            'code' => '8',
            'libelle' => 'Sous administration légale (Mineur]',
        ],
        self::LEGALE_CAPACITY_UNDER_SUPERVISION_MAJOR => [
            'code' => '2',
            'libelle' => 'Tutelle (Majeur]',
        ],
        self::LEGALE_CAPACITY_UNDER_SUPERVISION_MINOR => [
            'code' => '7',
            'libelle' => 'Tutelle (Mineur]',
        ]
    ];

    /**
     * FISCALITY COUNTRY
     */
    public const FISCALITY_COUNTRY_FRANCE = 'france';
    public const FISCALITY_COUNTRY_GUYANA = 'guyana';

    public const AVAILABLE_FISCALITY_COUNTRY = [
      self::FISCALITY_COUNTRY_FRANCE,
      self::FISCALITY_COUNTRY_GUYANA,
    ];
    public const FISCALITY_COUNTRY_MAP = [
        self::FISCALITY_COUNTRY_FRANCE => [
            'code' => 'XXXXXFRANCE',
            'libelle' => 'FRANCE',
        ],
        self::FISCALITY_COUNTRY_GUYANA => [
            'code' => 'XXXXXGUADELOUPE',
            'libelle' => 'GUADELOUPE',
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

    public const VOUCHERS_ADDRESS_PROOF = 'address_proof';
    public const VOUCHERS_ADDRESS_PROOF_2 = 'address_proof_2';
    public const VOUCHERS_WEDDING_CONTRACT = 'wedding_contract';
    public const VOUCHERS_ARBITRAGE_MANDATE = 'arbitrage_mandate';
    public const VOUCHERS_VALID_CNI = 'valid_cni';
    public const VOUCHERS_NATIONAL_IDENTITY_CARD = 'national_identity_card';
    public const VOUCHERS_PASSPORT = 'passport';
    public const VOUCHERS_DRIVING_LICENSE_SECOND_GENERATION = 'driving_license_second_generation';
    public const VOUCHERS_FAMILY_RECORD_BOOK = 'family_record';
    public const VOUCHERS_FRENCH_ELECTORAL_MAP = 'french_electoral_map';
    public const VOUCHERS_BIRTH_CERTIFICATE = 'birth_certificate';
    public const VOUCHERS_VALID_OFFICIAL_IDENTITY = 'valid_official_identity';
    public const VOUCHERS_DIRECT_DEBIT_MANDATE = 'direct_debit_mandate';
    public const VOUCHERS_BENEFICIARY_DECLARATION_FORM = 'direct_debit_beneficiary_declaration_form';
    public const VOUCHERS_USEFUL_FREE = 'useful_free';
    public const VOUCHERS_RIB = 'rib';
    public const VOUCHERS_WEDDING_CERTIFICATE = 'wedding_certificate';
    public const VOUCHERS_PEOPLE_SAVING_PLAN_CERTIFICATE = 'people_saving_plan_certificate';
    public const VOUCHERS_FATCA_CRS_OCDE = 'fatca_crs_ocde';
    public const VOUCHERS_COURTIER_PRESENTATION = 'courtier_presentation';
    public const VOUCHERS_W8_BEN_CERTIFICATE = 'w8_ben_certificate';


    public const AVAILABLE_VOUCHERS = [
        self::VOUCHERS_ADDRESS_PROOF,
        self::VOUCHERS_ADDRESS_PROOF_2,
        self::VOUCHERS_WEDDING_CONTRACT,
        self::VOUCHERS_ARBITRAGE_MANDATE,
        self::VOUCHERS_VALID_CNI,
        self::VOUCHERS_NATIONAL_IDENTITY_CARD,
        self::VOUCHERS_PASSPORT,
        self::VOUCHERS_DRIVING_LICENSE_SECOND_GENERATION,
        self::VOUCHERS_FAMILY_RECORD_BOOK,
        self::VOUCHERS_FRENCH_ELECTORAL_MAP,
        self::VOUCHERS_BIRTH_CERTIFICATE,
        self::VOUCHERS_VALID_OFFICIAL_IDENTITY,
        self::VOUCHERS_DIRECT_DEBIT_MANDATE,
        self::VOUCHERS_BENEFICIARY_DECLARATION_FORM,
        self::VOUCHERS_USEFUL_FREE,
        self::VOUCHERS_RIB,
        self::VOUCHERS_WEDDING_CERTIFICATE,
        self::VOUCHERS_PEOPLE_SAVING_PLAN_CERTIFICATE,
        self::VOUCHERS_FATCA_CRS_OCDE,
        self::VOUCHERS_COURTIER_PRESENTATION,
        self::VOUCHERS_W8_BEN_CERTIFICATE
    ];

    public const VOUCHERS_MAP = [
        self::VOUCHERS_ADDRESS_PROOF  => [
          'code' => 'FE03',
          'libelle' => 'Un justificatif de domicile de moins de 3 mois si l\'adresse de la pièce d\'identi',
      ],
        self::VOUCHERS_ADDRESS_PROOF_2 => [
          'code' => 'FE04',
          'libelle' => 'Un justificatif de domicile de moins de 3 mois si l\'adresse de la pièce d\'identi',
      ],
        self::VOUCHERS_WEDDING_CONTRACT => [
            'code' => 'FE07',
            'libelle' => 'La photocopie du contrat de mariage (communauté universelle avec clause d\'attrib',
        ],
        self::VOUCHERS_ARBITRAGE_MANDATE => [
            'code' => 'FE13',
            'libelle' => 'Mandat d\'arbitrage',
        ],
        self::VOUCHERS_VALID_CNI => [
            'code' => 'FE20',
            'libelle' => 'CNI en cours de validité ou Passeport ou Permis de conduire ou Carte de séjour o',
        ],
        self::VOUCHERS_NATIONAL_IDENTITY_CARD => [
            'code' => 'FE21',
            'libelle' => 'La Carte Nationale d\'Identité (CNI] du {0}',
        ],
        self::VOUCHERS_PASSPORT => [
            'code' => 'FE22',
            'libelle' => 'Le passeport du {0}',
        ],
        self::VOUCHERS_DRIVING_LICENSE_SECOND_GENERATION => [
            'code' => 'FE23',
            'libelle' => 'Le permis de conduire seconde génération avec date de validité',
        ],
        self::VOUCHERS_FAMILY_RECORD_BOOK => [
            'code' => 'FE25',
            'libelle' => 'Pages du livret de famille où figure le {0}',
        ],
        self::VOUCHERS_FRENCH_ELECTORAL_MAP => [
            'code' => 'FE26',
            'libelle' => 'Carte électorale française du {0}',
        ],
        self::VOUCHERS_BIRTH_CERTIFICATE => [
            'code' => 'FE27',
            'libelle' => 'Acte de naissance du {0}',
        ],
        self::VOUCHERS_VALID_OFFICIAL_IDENTITY => [
            'code' => 'FE30',
            'libelle' => 'La photocopie recto-verso d\'une pièce officielle d\'identité en cours de validité',
        ],
        self::VOUCHERS_DIRECT_DEBIT_MANDATE => [
            'code' => 'FE31',
            'libelle' => 'Mandat de prélèvement',
        ],
        self::VOUCHERS_BENEFICIARY_DECLARATION_FORM => [
            'code' => 'FE32',
            'libelle' => 'Le formulaire de déclaration de bénéficiaires (obligatoire si ma clause excède 1',
        ],
        self::VOUCHERS_USEFUL_FREE => [
            'code' => 'FE34',
            'libelle' => 'Pièce libre utile en complément du dossier',
        ],
        self::VOUCHERS_RIB => [
            'code' => 'FE35',
            'libelle' => 'Le Relevé d\'Identité Bancaire (RIB]',
        ],
        self::VOUCHERS_WEDDING_CERTIFICATE => [
            'code' => 'FE36',
            'libelle' => 'La photocopie d\'un extrait d\'acte de mariage.',
        ],
        self::VOUCHERS_PEOPLE_SAVING_PLAN_CERTIFICATE => [
            'code' => 'FE37',
            'libelle' => 'L\'attestation d\'ouverture de Plan d\'épargne Populaire (PEP] signée.',
        ],
        self::VOUCHERS_FATCA_CRS_OCDE => [
            'code' => 'FE39',
            'libelle' => 'Le questionnaire FATCA/CRS-OCDE complété et signé',
        ],
        self::VOUCHERS_COURTIER_PRESENTATION => [
            'code' => 'FE38',
            'libelle' => 'La fiche de présentation de mon ${courtier} signée dont je conserve un exemplair',
        ],
        self::VOUCHERS_W8_BEN_CERTIFICATE => [
            'code' => 'FE40',
            'libelle' => 'Le certificat W8-BEN relatif au co-contractant',
        ]
    ];

    public const PIECESJUSTIFICATIVES = [
        [
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
    /**
     * ADDRESS COUNTRY
     */
    public const ADDRESS_COUNTRY_FRANCE = 'france';

    public const AVAILABLE_ADDRESS_COUNTRY = [
        self::ADDRESS_COUNTRY_FRANCE
    ];
    public const ADDRESS_COUNTRY_MAP = [
        self::ADDRESS_COUNTRY_FRANCE => [
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

    public const IDENTITY_DOC_NATIONAL_CARD = 'national_card';
    public const IDENTITY_DOC_PASSPORT = 'passport';
    public const IDENTITY_DOC_NEW_DRIVER_LICENSE = 'new_driver_license';

    public const AVAILABLE_IDENTITY_DOC = [
        self::IDENTITY_DOC_NATIONAL_CARD,
        self::IDENTITY_DOC_PASSPORT,
        self::IDENTITY_DOC_NEW_DRIVER_LICENSE,
    ];
    public const IDENTITY_DOC_MAP = [
        self::IDENTITY_DOC_NATIONAL_CARD => [
            'code' => 'FE21',
            'libelle' => 'Carte Nationale d\'Identité (CNI]',
        ],
        self::IDENTITY_DOC_PASSPORT => [
            'code' => 'FE22',
            'libelle' => 'Passeport',
        ],
        self::IDENTITY_DOC_NEW_DRIVER_LICENSE => [
            'code' => 'FE23',
            'libelle' => 'Nouveau permis de conduire',
        ],
    ];


    /**
     * IDENTITY DOCUMENT 2
     */
    public const IDENTITY_DOC_2_NATIONAL_CARD = 'national_card';
    public const IDENTITY_DOC_2_PASSPORT = 'passport';
    public const IDENTITY_DOC_2_NEW_DRIVER_LICENSE = 'new_driver_license';
    public const IDENTITY_DOC_2_FAMILY_RECORD = 'family_record';
    public const IDENTITY_DOC_2_ELECTORALE_CARD = 'electorale_card';
    public const IDENTITY_DOC_2_BIRTH_CERTIFICATE = 'birth_certificate';
    public const IDENTITY_DOC_2_DRIVER_LICENSE = 'driver_license';

    public const IDENTITY_DOC_2_MAP = [
        self::IDENTITY_DOC_2_NATIONAL_CARD => 'FE21',
        self::IDENTITY_DOC_2_PASSPORT => 'FE22',
        self::IDENTITY_DOC_2_NEW_DRIVER_LICENSE => 'FE23',
        self::IDENTITY_DOC_2_FAMILY_RECORD => 'FE25',
        self::IDENTITY_DOC_2_ELECTORALE_CARD => 'FE26',
        self::IDENTITY_DOC_2_BIRTH_CERTIFICATE => 'FE27',
        self::IDENTITY_DOC_2_DRIVER_LICENSE => 'FE30',
    ];

    public const AVAILABLE_IDENTITY_DOC_2 = [
        self::IDENTITY_DOC_2_NATIONAL_CARD,
        self::IDENTITY_DOC_2_PASSPORT,
        self::IDENTITY_DOC_2_NEW_DRIVER_LICENSE,
        self::IDENTITY_DOC_2_FAMILY_RECORD,
        self::IDENTITY_DOC_2_ELECTORALE_CARD,
        self::IDENTITY_DOC_2_BIRTH_CERTIFICATE,
        self::IDENTITY_DOC_2_DRIVER_LICENSE,
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

<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\PdfGenerator;

use Mpp\GeneraliClientBundle\Model\Document;
use Mpp\GeneraliClientBundle\Model\Subscription;
use Mpp\GeneraliClientBundle\Model\SubscriptionConstant;
use Psr\Log\LoggerInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Twig\Environment;
use GuzzleHttp\Client;

/**
 * Class GeneraliPdfGenerator.
 */
class GeneraliPdfGenerator implements GeneraliPdfGeneratorInterface
{
    /** @var Environment */
    private $twig;

    /** @var LoggerInterface */
    private $logger;

    /** @var Client */
    private $wkHtmlToPdfClient;

    private $exportPathFile;

    public function __construct(Environment $twig, LoggerInterface $logger, Client $wkHtmlToPdfClient, $exportPathFile)
    {
        $this->twig = $twig;
        $this->logger = $logger;
        $this->wkHtmlToPdfClient = $wkHtmlToPdfClient;
        $this->exportPathFile = $exportPathFile;
    }

    /**
     * @return mixed
     */
    public function getExportPathFile()
    {
        return $this->exportPathFile;
    }

    /**
     * @param array $fileParameters
     *
     * @return array
     */
    private function resolveFileParameters(array $fileParameters)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('resp')->setAllowedTypes('resp', ['array'])->setNormalizer('resp', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('civility')->setAllowedTypes('civility', ['string'])
                    ->setRequired('lastname')->setAllowedTypes('lastname', ['string'])
                    ->setRequired('firstname')->setAllowedTypes('firstname', ['string'])
                    ->setRequired('birthname')->setAllowedTypes('birthname', ['string'])
                    ->setRequired('address')->setAllowedTypes('address', ['string'])
                    ->setRequired('zipcode')->setAllowedTypes('zipcode', ['integer'])
                    ->setRequired('city')->setAllowedTypes('city', ['string'])
                    ->setRequired('country')->setAllowedTypes('country', ['string'])
                    ->setRequired('birthdate')->setAllowedTypes('birthdate', ['\DateTime'])->setNormalizer('birthdate', function (Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('birthZipcode')->setAllowedTypes('birthZipcode', ['integer'])
                    ->setRequired('birthCity')->setAllowedTypes('birthCity', ['string'])
                    ->setRequired('birthCountry')->setAllowedTypes('birthCountry', ['string'])
                    ->setRequired('nationality')->setAllowedTypes('nationality', ['string'])
                    ->setRequired('taxCountry')->setAllowedTypes('taxCountry', ['string'])
                    ->setRequired('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])
                    ->setRequired('email')->setAllowedTypes('email', ['string'])
                    ->setDefined('identityDocumentType')->setAllowedTypes('identityDocumentType', ['string'])
                    ->setRequired('maritalStatus')->setAllowedTypes('maritalStatus', ['string'])
                    ->setDefined('matrimonialRegime')->setAllowedTypes('matrimonialRegime',['string'])
                    ->setRequired('nbChildren')->setAllowedTypes('nbChildren', ['integer'])
                    ->setRequired('professionalStatus')->setAllowedtypes('professionalStatus', ['string'])
                    ->setRequired('socioprofessionalCategory')->setAllowedTypes('socioprofessionalCategory', ['string'])
                    ->setRequired('activityArea')->setAllowedTypes('activityArea', ['string'])
                    ->setRequired('employer')->setAllowedTypes('employer', ['string'])
                    ->setRequired('siretNumber')->setAllowedTypes('siretNumber', ['integer'])
                    ->setRequired('job')->setAllowedTypes('job', ['string'])
                    ->setRequired('activityEndDate')->setAllowedTypes('activityEndDate', ['\DateTime'])->setNormalizer('activityEndDate', function (Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('incomeCategory')->setAllowedTypes('incomeCategory', ['string'])
                    ->setRequired('patrimonyCategory')->setAllowedTypes('patrimonyCategory', ['string'])
                    ->setRequired('percentFinancialInstruments')->setAllowedTypes('percentFinancialInstruments', ['string'])
                    ->setRequired('percentSavings')->setAllowedTypes('percentSavings', ['string'])
                    ->setRequired('percentCapitalizationContracts')->setAllowedTypes('percentCapitalizationContracts', ['string'])
                    ->setRequired('percentOthers')->setAllowedTypes('percentOthers', ['string'])
                    ->setRequired('patrimonyOrigins')->setAllowedTypes('patrimonyOrigins', ['string'])
                    ->setRequired('goals')->setAllowedTypes('goals', ['string'])
                    ->setRequired('durationCategory')->setAllowedTypes('durationCategory', ['string'])
                    ->setRequired('percentEstate')->setAllowedTypes('percentEstate', ['string'])
                    ->setRequired('fundsOrigins')->setAllowedTypes('fundsOrigins', ['array'])->setNormalizer('fundsOrigins', function (Options $options, $values) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('label')->setAllowedTypes('label', ['string'])
                            ->setRequired('date')->setAllowedTypes('date', ['\DateTime'])->setNormalizer('date', function (Options $options, $value) {
                                return $value->format('Y-m-d');
                            })
                            ->setRequired('amount')->setAllowedTypes('amount', ['integer'])
                        ;

                        $resolvedValues = [];
                        foreach ($values as $value) {
                            $resolvedValues[] = $resolver->resolve($value);
                        }

                        return $resolvedValues;
                    })
                    ->setRequired('accountNumber')->setAllowedTypes('accountNumber', ['string'])
                    ->setRequired('beneficiaryClause')->setAllowedTypes('beneficiaryClause', ['string'])
                    ->setRequired('bic')->setAllowedTypes('bic', ['string'])
                    ->setRequired('contractId')->setAllowedTypes('contractId', ['string'])
                    ->setRequired('counter')->setAllowedTypes('counter', ['string'])
                    ->setRequired('establishmentCode')->setAllowedTypes('establishmentCode', ['string'])
                    ->setRequired('iban')->setAllowedTypes('iban', ['string'])
                    ->setRequired('initialInvestment')->setAllowedTypes('initialInvestment', ['string'])
                    ->setRequired('monthlyInvestment')->setAllowedTypes('monthlyInvestment', ['string'])
                    ->setRequired('ribKey')->setAllowedTypes('ribKey', ['string'])
                    ->setRequired('todayDate')->setAllowedTypes('todayDate', ['\DateTime'])->setNormalizer('todayDate', function (Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('initialRepartition')->setAllowedTypes('initialRepartition', ['array'])->setNormalizer('initialRepartition', function (Options $options, $values) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('name')->setAllowedTypes('name', ['string'])
                            ->setRequired('isin')->setAllowedTypes('isin', ['string'])
                            ->setRequired('percent')->setAllowedTypes('percent', ['string'])
                        ;

                        $resolvedValues = [];
                        foreach ($values as $value) {
                            $resolvedValues[] = $resolver->resolve($value);
                        }

                        return $resolvedValues;
                    })
                    ->setRequired('monthlyRepartition')->setAllowedTypes('monthlyRepartition', ['array'])->setNormalizer('monthlyRepartition', function (Options $options, $values) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('name')->setAllowedTypes('name', ['string'])
                            ->setRequired('isin')->setAllowedTypes('isin', ['string'])
                            ->setRequired('percent')->setAllowedTypes('percent', ['string'])
                        ;

                        $resolvedValues = [];
                        foreach ($values as $value) {
                            $resolvedValues[] = $resolver->resolve($value);
                        }

                        return $resolvedValues;
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('otherTaxCountry')->setAllowedTypes('otherTaxCountry', ['string'])
            ->setRequired('taxCountry')->setAllowedTypes('taxCountry', ['string'])
            ->setRequired('nif')->setAllowedTypes('nif', ['string'])
            ->setRequired('taxAddress')->setAllowedTypes('taxAddress', ['string'])
            ->setRequired('noDematerialization')->setAllowedTypes('noDematerialization', ['string'])
        ;

        return $resolver->resolve($fileParameters);
    }

    /**
     * @param string $template
     * @param Subscription  $subscription
     *
     * @return Document
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function generateFile(string $template, array $parameters): Document
    {
        $resolvedParameters = $this->resolveFileParameters($parameters);

        $html = $this->twig->render($template, $resolvedParameters);
        $this->logger->info('[Generali - pdfGenerator.renderHtml] SUCCESS');

        $result = $this->wkHtmlToPdfClient->post(
            '/',
            [
                'body' => json_encode([
                    'contents' => base64_encode($html),
                ]),
            ]
        );
        $filename = hash('sha1', json_encode($resolvedParameters)).'.pdf';

        file_put_contents(
            $this->getExportPathFile().$filename,
            $result->getBody()->getContents()
        );

        $this->logger->info('[Generali - pdfGenerator.exportPdf] SUCCESS');

        return (new Document())
            ->setFilename($filename)
            ->setFilePath($this->getExportPathFile())
            ->setTitle('Debit mandate');
    }

    /**
     * @param Subscription $subscription
     * @return array
     * @throws \Exception
     */
    public function subscriptionToFileMapper(Subscription $subscription): array
    {
        $response = [];

        $subscriber = $subscription->getSubscriber();
        $folder = $subscription->getCustomerFolder();
        $settlement = $subscription->getSettlement();

        $response['resp'] = [
            'civility'=> $subscriber->getCivility(),
            'lastname'=> $subscriber->getLastName(),
            'firstname'=> $subscriber->getFirstName(),
            'birthname'=> $subscriber->getBirthName(),
            'address'=> $subscriber->getAddressPostBox() .' '.$subscriber->getAddressStreetName(),
            'zipcode'=> $subscriber->getAddressPostalCode(),
            'city'=> $subscriber->getAddressCity(),
            'country'=> $subscriber->getAddressCountryCode(),
            'birthdate'=> $subscriber->getBirthDate(),
            'birthZipcode'=> $subscriber->getBirthPostalCode(),
            'birthCity'=> $subscriber->getBirthInseeCode(),
            'birthCountry'=> $subscriber->getBirthCountry(),
            'nationality'=> $subscriber->getNationality(),
            'taxCountry'=> $subscriber->getTaxCountry(),
            'phoneNumber'=> $subscriber->getPhoneNumber(),
            'email'=> $subscriber->getEmail(),
            'identityDocumentType'=> $subscriber->getIdentityDocCode(),
            'maritalStatus'=> $subscriber->getFamilialSituation(),
            'matrimonialRegime'=> $subscriber->getMatrimonialRegime(),
            'nbChildren'=> 000000000, //TODO
            'professionalStatus'=> $subscriber->getProfessionalSituation(),
            'socioprofessionalCategory'=> $subscriber->getCspCode(),
            'activityArea'=> 'toto',
            'employer'=> $subscriber->getEmployerName(),
            'siretNumber'=> $subscriber->getSiretNumber(),
            'job'=> $subscriber->getProfession(),
            'activityEndDate'=> $subscriber->getStartDateInactivity(),
            'incomeCategory'=> $folder->getIncomeCode(),
            'patrimonyCategory'=> $folder->getAssetCode(),
            'percentEstate'=> 'toto',
            'percentFinancialInstruments'=> 'toto',
            'percentSavings'=> 'toto',
            'percentCapitalizationContracts'=> 'toto',
            'percentOthers'=> 'toto',
            'patrimonyOrigins'=> 'toto',
            'goals'=> 'toto',
            'durationCategory'=> $subscription->getDurationType(),
            'beneficiaryClause'=> $subscription->getDeathBeneficiaryClauseCode(),
            'initialInvestment'=> 'toto',
            'todayDate'=> new \DateTime('now'),
            'contractId'=> 'toto', //TODO idTransaction ?
            'establishmentCode'=> 'toto',
            'counter'=> 'toto',
            'accountNumber'=> 'toto',
            'ribKey'=> 'toto',
            'iban'=> $settlement->getAccountIban(),
            'bic'=> $settlement->getAccountBic(),
            'monthlyInvestment'=> 'toto',
        ];

        $funds_origin = [];

        foreach ($settlement->getFundsOrigin() as $fundOrigin) {
            $funds_origin[] = [
                'label' => $fundOrigin->getCode(),
                'date' => $fundOrigin->getDate(),
                'amount' => $fundOrigin->getAmount(),
            ];
        }
        $response['resp']['fundsOrigins'] = $funds_origin;

        $response['otherTaxCountry'] = 'toto';
        $response['taxCountry'] = 'toto';
        $response['nif'] = 'toto';
        $response['taxAddress'] = 'toto';
        $response['noDematerialization'] = 'toto';

        $response['resp']['initialRepartition'] = [
            [
                'name'=> 'toto',
                'isin'=> 'toto',
                'percent'=> 'toto',
            ], [
                'name'=> 'toto',
                'isin'=> 'toto',
                'percent'=> 'toto',
            ]
        ];

        $response['resp']['monthlyRepartition'] = [
            [
                'name'=> 'toto',
                'isin'=> 'toto',
                'percent'=> 'toto',
            ],[
                'name'=> 'toto',
                'isin'=> 'toto',
                'percent'=> 'toto',
            ]
        ];

        return $response;
    }
}

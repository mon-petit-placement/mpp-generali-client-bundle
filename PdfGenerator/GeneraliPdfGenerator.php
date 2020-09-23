<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\PdfGenerator;

use Mpp\GeneraliClientBundle\Factory\PdfParameterFactory;
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
    /**
     * @var PdfParameterFactory
     */
    private $pdfParameterFactory;
    /** @var Environment */
    private $twig;

    /** @var LoggerInterface */
    private $logger;

    /** @var Client */
    private $wkHtmlToPdfClient;

    private $exportPathFile;

    public function __construct(PdfParameterFactory $pdfParameterFactory, Environment $twig, LoggerInterface $logger, Client $wkHtmlToPdfClient, $exportPathFile)
    {
        $this->pdfParameterFactory = $pdfParameterFactory;
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
        $resolver = new OptionsResolver();
        $this->pdfParameterFactory->configureData($resolver);
        $resolvedData = $resolver->resolve($parameters);

        $html = $this->twig->render($template, $resolvedData);
        $this->logger->info('[Generali - pdfGenerator.renderHtml] SUCCESS');

        $result = $this->wkHtmlToPdfClient->post(
            '/',
            [
                'body' => json_encode([
                    'contents' => base64_encode($html),
                ]),
            ]
        );
        $filename = hash('sha1', json_encode($resolvedData)).'.pdf';

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
                'label' => $fundOrigin->getCodeOrigin(),
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

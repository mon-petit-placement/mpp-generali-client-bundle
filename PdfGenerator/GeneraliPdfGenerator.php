<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\PdfGenerator;

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
                    ->setRequired('civility')->setAllowedValues('civility', SubscriptionConstant::AVAILABLE_CIVILITY)->setNormalizer('civility', function (Options $options, $value) {
                        return SubscriptionConstant::CIVILITY_MAP[$value]['code'];
                    })
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
                    ->setRequired('birthCountry')->setAllowedValues('birthCountry', SubscriptionConstant::AVAILABLE_COUNTRY)->setNormalizer('birthCountry', function (Options $options, $value) {
                        return SubscriptionConstant::COUNTRY_MAP[$value]['code'];
                    })
                    ->setRequired('nationality')->setAllowedTypes('nationality', ['string'])
                    ->setRequired('taxCountry')->setAllowedValues('taxCountry', SubscriptionConstant::AVAILABLE_COUNTRY)->setNormalizer('taxCountry', function (Options $options, $value) {
                        return SubscriptionConstant::COUNTRY_MAP[$value]['code'];
                    })
                    ->setRequired('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])
                    ->setRequired('email')->setAllowedTypes('email', ['string'])
                    ->setDefined('identityDocumentType')->setAllowedValues('identityDocumentType', SubscriptionConstant::AVAILABLE_IDENTITY_DOC)->setNormalizer('identityDocumentType', function (Options $options, $value) {
                        return SubscriptionConstant::IDENTITY_DOC_MAP[$value]['code'];
                    })
                    ->setRequired('maritalStatus')->setAllowedValues('maritalStatus', SubscriptionConstant::AVAILABLE_FAMILY_SITUATION)->setNormalizer('maritalStatus', function (Options $options, $value) {
                        return SubscriptionConstant::FAMILY_SITUATION_MAP[$value]['code'];
                    })
                    ->setDefined('matrimonialRegime')->setAllowedValues('matrimonialRegime', SubscriptionConstant::AVAILABLE_MATRIMONIAL_REGIME)->setNormalizer('matrimonialRegime', function (Options $options, $value) {
                        return SubscriptionConstant::MATRIMONIAL_REGIME_MAP[$value]['code'];
                    })
                    ->setRequired('nbChildren')->setAllowedTypes('nbChildren', ['integer'])
                    ->setRequired('professionalStatus')->setAllowedValues('professionalStatus', SubscriptionConstant::AVAILABLE_PROFESSIONAL_SITUATION)->setNormalizer('professionalStatus', function (Options $options, $value) {
                        return SubscriptionConstant::PROFESSIONAL_SITUATION_MAP[$value]['code'];
                    })
                    ->setRequired('socioprofessionalCategory')->setAllowedTypes('socioprofessionalCategory', ['string'])
                    ->setRequired('activityArea')->setAllowedTypes('activityArea', ['string'])
                    ->setRequired('employer')->setAllowedTypes('employer', ['string'])
                    ->setRequired('siretNumber')->setAllowedTypes('siretNumber', ['integer'])
                    ->setRequired('job')->setAllowedTypes('job', ['string'])
                    ->setRequired('activityEndDate')->setAllowedTypes('activityEndDate', ['\DateTime'])->setNormalizer('activityEndDate', function (Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('incomeCategory')->setAllowedTypes('incomeCategory', ['string'])
                    ->setRequired('patrimonyCategory')->setAllowedValues('patrimonyCategory', SubscriptionConstant::AVAILABLE_PERSONAL_ASSETS)->setNormalizer('patrimonyCategory', function (Options $options, $value) {
                        return SubscriptionConstant::PERSONAL_ASSETS_MAP[$value]['code'];
                    })
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
     * @param array  $parameters
     *
     * @return string
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function generateFile(string $template, array $parameters): string
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
            $this->exportPathFile.$filename,
            $result->getBody()->getContents()
        );

        $this->logger->info('[Generali - pdfGenerator.exportPdf] SUCCESS');

        return $filename;
    }
}

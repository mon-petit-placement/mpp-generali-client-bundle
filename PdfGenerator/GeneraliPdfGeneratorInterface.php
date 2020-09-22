<?php

namespace Mpp\GeneraliClientBundle\PdfGenerator;

use Mpp\GeneraliClientBundle\Model\Document;
use Mpp\GeneraliClientBundle\Model\Subscription;

/**
 * Interface GeneraliPdfGeneratorInterface.
 */
interface GeneraliPdfGeneratorInterface
{
    /**
     * Transform data from Subscription to array usable by the method generateFile
     *
     * @param Subscription $subscription
     * @return array
     */
    public function subscriptionToFileMapper(Subscription $subscription): array;

    /**
     * generate a PDF file with your template & the data needed.
     *
     * path: POST http://wkhtmltopdf.yourproject.com
     *
     * @param string $template
     * @param array $parameters
     *
     * @return Document
     */
    public function generateFile(string $template, array $parameters): Document;
}

<?php

namespace Mpp\GeneraliClientBundle\PdfGenerator;

/**
 * Interface GeneraliPdfGeneratorInterface.
 */
interface GeneraliPdfGeneratorInterface
{
    /**
     * generate a PDF file with your template & the data needed.
     *
     * path: POST http://wkhtmltopdf.yourproject.com
     *
     * @param string $template
     * @param array  $parameters
     *
     * @return string
     */
    public function generateFile(string $template, array $parameters): string;
}

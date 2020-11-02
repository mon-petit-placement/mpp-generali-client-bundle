<?php

namespace Mpp\GeneraliClientBundle\Exception;

use Mpp\GeneraliClientBundle\Model\GeneraliApiError;

class GeneraliApiException extends \Exception
{
    public function __construct(GeneraliApiError $apicilApiError)
    {
        parent::__construct(
            (string) $apicilApiError,
            $apicilApiError->getErrorCode()
        );
    }
}

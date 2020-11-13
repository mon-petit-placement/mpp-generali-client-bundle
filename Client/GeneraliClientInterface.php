<?php

namespace Mpp\GeneraliClientBundle\Client;

interface GeneraliClientInterface
{
    /**
     * Retrieve the url base path.
     *
     * @return string
     */
    public function getBasePath(): string;

    /**
     * Retrieve the client alias.
     *
     * @return string
     */
    public static function getClientAlias(): string;
}

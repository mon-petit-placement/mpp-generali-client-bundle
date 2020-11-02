<?php

namespace Mpp\GeneraliClientBundle\Client;

interface GeneraliClientInterface
{
    /**
     * Retrieve the url base path.
     *
     * @method getBasePath
     *
     * @return string
     */
    public function getBasePath(): string;

    /**
     * Retrieve the client alias.
     *
     * @method getClientAlias
     *
     * @return string
     */
    public static function getClientAlias(): string;
}

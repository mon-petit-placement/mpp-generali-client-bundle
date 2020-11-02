<?php

namespace Mpp\GeneraliClientBundle\Model;

class TypeDenouement
{
    const CODE_PREMIER_DECES = 'PREMIER_DECES';
    const CODE_SECOND_DECES = 'SECOND_DECES';

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $libelle;
}

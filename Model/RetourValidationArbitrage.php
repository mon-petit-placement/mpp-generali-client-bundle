<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourValidationArbitrage
{
    /**
     * @var string|null
     */
    private $idTransaction;

    /**
     * @var string|null
     */
    private $numeroOrdreTransaction;

    /**
     * @var array<PieceAFournir>|null
     */
    private $piecesAFournir;
}

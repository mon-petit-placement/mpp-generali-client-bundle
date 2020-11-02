<?php

namespace Mpp\GeneraliClientBundle\Model;

class Seuil
{
    /**
     * @var float|null
     */
    private $montantMin;

    /**
     * @var float|null
     */
    private $minParSupport;

    /**
     * @var SeuilParPeriodicite|null
     */
    private $seuilsParPeriodicite;
}

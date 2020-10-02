<?php

namespace Mpp\GeneraliClientBundle\Factory;

/**
 * Interface FactoryInterface.
 */
interface FactoryInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);
}

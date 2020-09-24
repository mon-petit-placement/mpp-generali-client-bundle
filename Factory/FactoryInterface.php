<?php

namespace Mpp\GeneraliClientBundle\Factory;

interface FactoryInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);
}

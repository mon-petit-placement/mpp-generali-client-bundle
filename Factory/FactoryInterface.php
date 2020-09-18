<?php


namespace Mpp\GeneraliClientBundle\Factory;


use Mpp\GeneraliClientBundle\Model\Subscriber;

interface FactoryInterface
{
    /**
     * @param array $data
     * @param string $contractNumber
     * @return mixed
     */
    public function create(array $data, string $contractNumber);
}
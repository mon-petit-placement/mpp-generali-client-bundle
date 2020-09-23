<?php


namespace Mpp\GeneraliClientBundle\Factory;


use Mpp\GeneraliClientBundle\Model\Subscriber;

interface FactoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);
}
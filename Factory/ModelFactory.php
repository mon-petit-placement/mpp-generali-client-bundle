<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Symfony\Component\Serializer\SerializerInterface;

class ModelFactory
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Create a model object from array.
     *
     * @param string $modelClass
     * @param array  $parameters
     *
     * @return mixed Model object
     */
    public function createFromArray(string $modelClass, array $parameters)
    {
        return $this->createFromJson($modelClass, json_encode($parameters));
    }

    /**
     * Create a model object from json.
     *
     * @param string $modelClass
     * @param string $json
     *
     * @return mixed Model object
     */
    public function createFromJson(string $modelClass, string $json)
    {
        return $this->serializer->deserialize($json, $modelClass, 'json');
    }
}

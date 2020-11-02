<?php

namespace Mpp\GeneraliClientBundle\Client;

interface GeneraliClientRegistryInterface
{
    /**
     * Check if the generali client is registered in the registry.
     *
     * @method has
     *
     * @param string $alias
     *
     * @return bool
     */
    public function has(string $alias): bool;

    /**
     * Register the generali client with the given alias.
     *
     * @method set
     *
     * @param string                  $alias
     * @param GeneraliClientInterface $client
     *
     * @return GeneraliClientRegistryInterface
     */
    public function set(string $alias, GeneraliClientInterface $client): GeneraliClientRegistryInterface;

    /**
     * Get the generali client by its alias.
     *
     * @method get
     *
     * @param string $alias
     *
     * @return GeneraliClientInterface
     */
    public function get(string $alias): GeneraliClientInterface;

    /**
     * Retrieve all generali client from the registry.
     *
     * @method all
     *
     * @return array
     */
    public function all(): array;
}

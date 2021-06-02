<?php

namespace Mpp\GeneraliClientBundle\Client;

use UnexpectedValueException;

class GeneraliClientRegistry implements GeneraliClientRegistryInterface
{
    /**
     * @var array
     */
    private $clients;

    /**
     * Proxy method to use $registry->getAlias() instead of $registry->get('alias').
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return GeneraliClientInterface
     */
    public function __call(string $method, array $arguments): GeneraliClientInterface
    {
        if (false !== strpos($method, 'get')) {
            $method = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', str_replace('get', '', $method))); // Extract client alias from method (ex: getClientAlias => client_alias)
        }

        return $this->get($method);
    }

    /**
     * {@inheritdoc}
     */
    public function has(string $alias): bool
    {
        return isset($this->clients[$alias]);
    }

    /**
     * {@inheritdoc}
     */
    public function set(string $alias, GeneraliClientInterface $client): GeneraliClientRegistryInterface
    {
        $this->clients[$alias] = $client;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws UnexpectedValueException if the generali client is not registered
     */
    public function get(string $alias): GeneraliClientInterface
    {
        if (!isset($this->clients[$alias])) {
            throw new UnexpectedValueException(sprintf('Could not retrieve generali client with alias %s', $alias));
        }

        return $this->clients[$alias];
    }

    /**
     * {@inheritdoc}
     */
    public function all(): array
    {
        return $this->clients;
    }
}

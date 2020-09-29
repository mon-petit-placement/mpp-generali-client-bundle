<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\HttpClient;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class GeneraliHttpClient.
 */
class GeneraliHttpClient
{
    /**
     * @param $value
     *
     * @return array
     */
    private function resolveFond($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('codeFonds')->setAllowedTypes('codeFonds', ['string'])
            ->setRequired('montant')->setAllowedTypes('montant', ['int'])
            ->setDefined('taux')->setAllowedTypes('taux', ['int'])
            ->setDefined('duree')->setAllowedTypes('duree', ['int'])
            ->setDefined('numeroEngagement')->setAllowedTypes('numeroEngagement', ['int'])
            ->setDefined('avenantValide')->setAllowedTypes('avenantValide', ['bool'])
            ->setDefined('pourcentage')->setAllowedTypes('pourcentage', ['int', 'double', 'float'])
        ;

        return $resolver->resolve($value);
    }
}

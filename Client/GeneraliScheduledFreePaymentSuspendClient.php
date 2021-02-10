<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliScheduledFreePaymentSuspendClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/transaction/suspensionVersementsLibresProgrammes
     * Init a scheduled free payment suspend request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function init(array $context): ?ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired(['numContrat'])
            ->setDefined(['codeApporteur'])
        ;

        return $this->getApiResponse(null, 'POST', sprintf('/%s', $context['numContrat']), [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'scheduled_free_payment_suspend';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/transaction/suspensionVersementsLibresProgrammes';
    }
}

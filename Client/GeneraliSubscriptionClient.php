<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliSubscriptionClient extends AbstractGeneraliClient
{
    public function getData(array $expectedItems = []): BaseResponse
    {
        return $this->request('POST', '/donnees', [
            'body' => json_encode([
                'contexte' => $this->buildContext([], $expectedItems)->toArray(),
            ]),
        ]);
    }

    public function create(Context $context, Subscription $subscription, bool $dematerialization = true, string $comment = null): ApiResponse
    {
        $response = $this->init($context, $subscription, $dematerialization, $comment);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The Subsriptions\' Initiation has failed');
        }

        $this->check($context);

        return $this->confirm($context);
    }

    public function init(Context $context, Subscription $subscription, bool $dematerialization = true, string $comment = null): ApiResponse
    {
        return $this->request('POST', '/initier', [
            'body' => json_encode([
                'contexte' => $context->arrayToInitiateSubscription(),
                'souscription' => $subscription->toArray(),
                'commentaire' => $comment,
                'dematerialisationCourriers' => $dematerialization,
            ]),
        ]);
    }

    public function check(Context $context): ApiResponse
    {
        return $this->request('POST', '/verifier', [
            'body' => json_encode([
                'contexte' => $context->arrayToCheck(),
            ]),
        ]);
    }

    public function confirm(Context $context): ApiResponse
    {
        return $this->request('POST', '/confirmer', [
            'body' => json_encode([
                'contexte' => $context->arrayToConfirm(),
                'options' => [
                    'genererUnBulletin' => true,
                    'envoyerUnMailClient' => true,
                    'cloturerLeDossier' => true,
                ],
            ]),
        ]);
    }

    public function finalize(Context $context, array $documents): ApiResponse
    {
        $response = new ApiResponse();

        foreach ($documents as $document) {
            $response = $this->sendFile($context->getIdTransaction(), $document);
            if (!empty($response->getErrorMessages())) {
                return $response;
            }
        }

        return $this->request('POST', '/finaliser', [
            'body' => json_encode([
                'contexte' => $context->arrayToFinalize(),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'subscription';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/souscription';
    }
}

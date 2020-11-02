<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

use Mpp\GeneraliClientBundle\Client\GeneraliArbitrationClient;
use Mpp\GeneraliClientBundle\Client\GeneraliContractClient;
use Mpp\GeneraliClientBundle\Client\GeneraliDocumentClient;
use Mpp\GeneraliClientBundle\Client\GeneraliFreePaymentClient;
use Mpp\GeneraliClientBundle\Client\GeneraliFundsClient;
use Mpp\GeneraliClientBundle\Client\GeneraliPartialRepurchaseClient;
use Mpp\GeneraliClientBundle\Client\GeneraliScheduledFreePaymentClient;
use Mpp\GeneraliClientBundle\Client\GeneraliScheduledFreePaymentEditClient;
use Mpp\GeneraliClientBundle\Client\GeneraliScheduledFreePaymentSuspendClient;
use Mpp\GeneraliClientBundle\Client\GeneraliSubscriptionClient;
use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;

class GeneraliClientRegistryTest extends GeneraliClientTest
{
    public function testArbitrationClient()
    {
        $arbitrationClient = self::$registry->getArbitration();

        $this->assertEquals($arbitrationClient, self::$registry->get('arbitration'));
        $this->assertInstanceOf(GeneraliArbitrationClient::class, $arbitrationClient);
    }

    public function testContractClient()
    {
        $contractClient = self::$registry->getContract();

        $this->assertEquals($contractClient, self::$registry->get('contract'));
        $this->assertInstanceOf(GeneraliContractClient::class, $contractClient);
    }

    public function testDocumentClient()
    {
        $documentClient = self::$registry->getDocument();

        $this->assertEquals($documentClient, self::$registry->get('document'));
        $this->assertInstanceOf(GeneraliDocumentClient::class, $documentClient);
    }

    public function testFreePaymentClient()
    {
        $freePaymentClient = self::$registry->getFreePayment();

        $this->assertEquals($freePaymentClient, self::$registry->get('free_payment'));
        $this->assertInstanceOf(GeneraliFreePaymentClient::class, $freePaymentClient);
    }

    public function testFundsClient()
    {
        $fundsClient = self::$registry->getFunds();

        $this->assertEquals($fundsClient, self::$registry->get('funds'));
        $this->assertInstanceOf(GeneraliFundsClient::class, $fundsClient);
    }

    public function testPartialRepurchaseClient()
    {
        $partialRepurchaseClient = self::$registry->getPartialRepurchase();

        $this->assertEquals($partialRepurchaseClient, self::$registry->get('partial_repurchase'));
        $this->assertInstanceOf(GeneraliPartialRepurchaseClient::class, $partialRepurchaseClient);
    }

    public function testScheduledFreePaymentClient()
    {
        $scheduledFreePaymentClient = self::$registry->getScheduledFreePayment();

        $this->assertEquals($scheduledFreePaymentClient, self::$registry->get('scheduled_free_payment'));
        $this->assertInstanceOf(GeneraliScheduledFreePaymentClient::class, $scheduledFreePaymentClient);
    }

    public function testScheduledFreePaymentEditClient()
    {
        $scheduledFreePaymentEditClient = self::$registry->getScheduledFreePaymentEdit();

        $this->assertEquals($scheduledFreePaymentEditClient, self::$registry->get('scheduled_free_payment_edit'));
        $this->assertInstanceOf(GeneraliScheduledFreePaymentEditClient::class, $scheduledFreePaymentEditClient);
    }

    public function testScheduledFreePaymentSuspendClient()
    {
        $scheduledFreePaymentSuspendClient = self::$registry->getScheduledFreePaymentSuspend();

        $this->assertEquals($scheduledFreePaymentSuspendClient, self::$registry->get('scheduled_free_payment_suspend'));
        $this->assertInstanceOf(GeneraliScheduledFreePaymentSuspendClient::class, $scheduledFreePaymentSuspendClient);
    }

    public function testSubscriptionClient()
    {
        $subscriptionClient = self::$registry->getSubscription();

        $this->assertEquals($subscriptionClient, self::$registry->get('subscription'));
        $this->assertInstanceOf(GeneraliSubscriptionClient::class, $subscriptionClient);
    }

    public function testReferentialHandler()
    {
        var_dump(ReferentialHandler::getInstance());
        die();
    }
}

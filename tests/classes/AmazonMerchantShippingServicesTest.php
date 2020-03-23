<?php

use Georanma\AmazonMws\AmazonMerchantShippingServices;
use Orchestra\Testbench\TestCase;

class AmazonMerchantShippingServicesTest extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('amazon-mws.muteLog', 'Info');
        $app['config']->set('amazon-mws.AMAZON_SERVICE_URL', 'http://localhost/');
        $app['config']->set(
            'amazon-mws.store', [
                    'testStore' => [
                    'merchantId' => 'ABC_MARKET_1234',
                    'marketplaceId' => 'ABC3456789456',
                    'keyId' => 'key',
                    'secretkey' => 'secret',
                    ],
            ],
        );
    }

    /**
     * @test
     */
    public function it_should_set_shipment_request_details()
    {
        $shippingServices = new AmazonMerchantShippingServices('testStore', true, null);
        $this->assertEquals([], $shippingServices->setRequestDetails());
    }
}

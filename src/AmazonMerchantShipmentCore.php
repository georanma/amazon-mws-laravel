<?php namespace Georanma\AmazonMws;

use Georanma\AmazonMws\AmazonCore;

/**
 * Core class for Amazon Merchant Fulfillment API.
 *
 * This is the core class for the only object in the Amazon Merchant Fulfillment section.
 * It contains no methods in itself other than the constructor.
 */
abstract class AmazonMerchantShipmentCore extends AmazonCore
{
    /**
     * AmazonMerchantShipmentCore constructor sets up key information used in all Amazon Fulfillment Core requests
     *
     * This constructor is called when initializing all objects in the Amazon Fullfillment Core.
     * The parameters are passed by the child objects' constructors, which are
     * in turn passed to the AmazonCore constructor. See it for more information
     * on these parameters and common methods.
     * @param string $s <p>Name for the store you want to use.</p>
     * @param boolean $mock [optional] <p>This is a flag for enabling Mock Mode.
     * This defaults to <b>FALSE</b>.</p>
     * @param array|string $m [optional] <p>The files (or file) to use in Mock Mode.</p>
     * @param string $config [optional] <p>An alternate config file to set. Used for testing.</p>
     */
    public function __construct($s, $mock = false, $m = null)
    {
        parent::__construct($s, $mock, $m);

    }
}

?>

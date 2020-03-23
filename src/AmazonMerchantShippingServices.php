<?php namespace Georanma\AmazonMws;

use Georanma\AmazonMws\AmazonFeedsCore;

/**
 * Gets Eligible Shipping Services from Amazon for Creating Shipments.
 *
 * This Amazon Feeds Core object can submit feeds to Amazon.
 * In order to submit a feed, the feed's contents (as direct input or from a file)
 * and feed type must be set. Once the feed has been submitted,
 * the response from Amazon can be viewed with <i>getResponse</i>.
 */
class AmazonMerchantShippingServices extends AmazonMerchantShipmentCore
{


    /**
     * AmazonMerchantShippingServices constructor.
     * @param string $s <p>Name for the store you want to use as seen in the config file.
     * If this is not set to a valid name, none of these objects will work.</p>
     * @param boolean $mock [optional] <p>This is a flag for enabling Mock Mode.
     * When this is set to <b>TRUE</b>, the object will fetch responses from
     * files you specify instead of sending the requests to Amazon.
     * The log will indicate whether mock mode is on or off each time
     * an object is initialized. This defaults to <b>FALSE</b>.</p>
     * @param array|string $m [optional] <p>The files (or file) to use in Mock Mode.
     * When Mock Mode is enabled, the object will retrieve one of these files
     * from the list to use as a response. See <i>setMock</i> for more information.</p>
     */
    public function __construct($s, $mock = false, $m = null)
    {
        parent::__construct($s, $mock, $m);
    }

    public function setRequestDetails(){
        return [];
    }
}

?>

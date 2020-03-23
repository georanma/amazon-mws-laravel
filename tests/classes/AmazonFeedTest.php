<?php

use Georanma\AmazonMws\AmazonFeed;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-12-12 at 13:17:14.
 */
class AmazonFeedTest extends TestCase {

    /**
     * @var AmazonFeed
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void {
        resetLog();
        $this->object = new AmazonFeed('testStore', true, null);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void {

    }

    public function testSetFeedType(){
        $ok = $this->object->setFeedType('string');
        $this->assertNull($ok);
        $o = $this->object->getOptions();
        $this->assertArrayHasKey('FeedType',$o);
        $this->assertEquals('string',$o['FeedType']);
        $this->assertFalse($this->object->setFeedType(null));

    }

    public function testSetMarketplaceIds(){
        $ok = $this->object->setMarketplaceIds('string1');
        $this->assertNull($ok);
        $o = $this->object->getOptions();
        $this->assertArrayHasKey('MarketplaceIdList.Id.1',$o);
        $this->assertEquals('string1',$o['MarketplaceIdList.Id.1']);
        $ok2 = $this->object->setMarketplaceIds(array('string1','string2'));
        $this->assertNull($ok2);
        $o2 = $this->object->getOptions();
        $this->assertArrayHasKey('MarketplaceIdList.Id.1',$o2);
        $this->assertArrayHasKey('MarketplaceIdList.Id.2',$o2);
        $this->assertEquals('string1',$o2['MarketplaceIdList.Id.1']);
        $this->assertEquals('string2',$o2['MarketplaceIdList.Id.2']);
        $this->object->setMarketplaceIds('stringx');
        $o3 = $this->object->getOptions();
        $this->assertArrayNotHasKey('MarketplaceIdList.Id.2',$o3);
        $this->assertFalse($this->object->setMarketplaceIds(null));
    }

    /**
    * @return array
    */
    public function purgeProvider() {
        return array(
            array('true', null, 'true', 'Caution! Purge mode set!'),
            array('false', null, 'false', 'Purge mode deactivated.'),
            array(true, null, 'true', 'Caution! Purge mode set!'),
            array(false, null, 'false', 'Purge mode deactivated.'),
            array(null, false, null, null),
        );
    }

    /**
     * @dataProvider purgeProvider
     */
    public function testSetPurge($a, $b, $c, $d){
        $ok = $this->object->setPurge($a);
        $this->assertEquals($b,$ok);
        $o = $this->object->getOptions();
        if (!is_null($a)){
            $this->assertArrayHasKey('PurgeAndReplace',$o);
            $this->assertEquals($c,$o['PurgeAndReplace']);
            $check = parseLog();
            $this->assertEquals($d,$check[1]);
        } else {
            $this->assertArrayNotHasKey('PurgeAndReplace',$o);
        }
    }

    public function testSubmitFeed(){
        resetLog();
        $this->object->setMock(true,'submitFeed.xml');

        $this->assertFalse($this->object->submitFeed()); //nothing set yet
        $this->assertFalse($this->object->getResponse()); //no response yet either

        $this->object->setFeedContent('yes');
        $this->assertFalse($this->object->submitFeed()); //no feed type set yet

        $this->object->setFeedType('_MOCK_FEED_');
        $ok = $this->object->submitFeed(); //now it is good
        $this->assertNull($ok);

        $check = parseLog();
        $this->assertEquals('Single Mock File set: submitFeed.xml',$check[1]);
        $this->assertEquals('Feed\'s contents must be set in order to submit it!',$check[2]);
        $this->assertEquals('Feed Type must be set in order to submit a feed!',$check[3]);
        $this->assertEquals('Fetched Mock File: mock/submitFeed.xml',$check[4]);
        $this->assertEquals('Successfully submitted feed #1234567890 (_MOCK_FEED_)',$check[5]);

        $o = $this->object->getOptions();
        $this->assertEquals('SubmitFeed',$o['Action']);

        $r = $this->object->getResponse();
        $this->assertInternalType('array',$r);
        $this->assertArrayHasKey('FeedSubmissionId',$r);
        $this->assertEquals('1234567890',$r['FeedSubmissionId']);
        $this->assertArrayHasKey('FeedType',$r);
        $this->assertEquals('_MOCK_FEED_',$r['FeedType']);
        $this->assertArrayHasKey('SubmittedDate',$r);
        $this->assertEquals('2012-12-12T12:12:12+00:00',$r['SubmittedDate']);
        $this->assertArrayHasKey('FeedProcessingStatus',$r);
        $this->assertEquals('_SUBMITTED_',$r['FeedProcessingStatus']);
    }

}

require_once(__DIR__.'/../helperFunctions.php');

<?php

use Georanma\AmazonMws\AmazonServiceStatus;
use PHPUnit\Framework\TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-12-12 at 13:17:14.
 */
class AmazonServiceStatusTest extends TestCase {

    /**
     * @var AmazonServiceStatus
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void {
        resetLog();
        $this->object = new AmazonServiceStatus('testStore', null, true, null);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void {

    }

    public function testSetUp(){
        $obj = new AmazonServiceStatus('testStore', 'Inbound');
        $this->assertTrue($obj->isReady());
    }

    /**
    * @return array
    */
    public function serviceProvider() {
        return array(
            array(true, false, 'A boolean is not a service'),
            array(null, false, 'Service cannot be null'),
            array('Banana', false, 'Banana is not a valid service'),
            array('Inbound', true),
            array('Inventory', true),
            array('Orders', true),
            array('Outbound', true),
            array('Products', true),
            array('Sellers', true),
        );
    }

    /**
     * @dataProvider serviceProvider
     */
    public function testSetService($a, $b, $c = null){
        $this->assertEquals($b, $this->object->setService($a));
        $this->assertEquals($b, $this->object->isReady());
        if ($c){
            $log = parseLog();
            $this->assertEquals($c,$log[1]);
        }
        $this->assertFalse($this->object->setService('bloop'));
        $this->assertEquals($b, $this->object->isReady()); //already set, so no change
    }

    public function testFetchServiceStatus(){
        resetLog();
        $this->object->setMock(true,'fetchServiceStatus.xml');

        $this->assertFalse($this->object->fetchServiceStatus()); //no service set yet

        $this->object->setService('Inbound');
        $this->assertNull($this->object->fetchServiceStatus()); //now it is good

        $o = $this->object->getOptions();
        $this->assertEquals('GetServiceStatus',$o['Action']);

        $check = parseLog();
        $this->assertEquals('Single Mock File set: fetchServiceStatus.xml',$check[1]);
        $this->assertEquals('Service must be set in order to retrieve status',$check[2]);
        $this->assertEquals('Fetched Mock File: mock/fetchServiceStatus.xml',$check[3]);

        return $this->object;

    }

    /**
     * @depends testFetchServiceStatus
     */
    public function testgGetStatus($o){
        $get = $o->getStatus();
        $this->assertEquals('GREEN_I',$get);

        $this->assertFalse($this->object->getStatus()); //not fetched yet for this object
    }

    /**
     * @depends testFetchServiceStatus
     */
    public function testgGetTimestamp($o){
        $get = $o->getTimestamp();
        $this->assertEquals('2010-11-01T21:38:09.676Z',$get);

        $this->assertFalse($this->object->getTimestamp()); //not fetched yet for this object
    }

    /**
     * @depends testFetchServiceStatus
     */
    public function testgGetMessageId($o){
        $get = $o->getMessageId();
        $this->assertEquals('173964729I',$get);

        $this->assertFalse($this->object->getMessageId()); //not fetched yet for this object
    }

    /**
     * @depends testFetchServiceStatus
     */
    public function testGetMessageList($o){
        $x = array();
        $x[0] = 'We are experiencing high latency in UK because of heavy traffic.';
        $this->assertEquals($x,$o->getMessageList());

        $this->assertFalse($this->object->getMessageList()); //not fetched yet for this object
    }

}

require_once(__DIR__.'/../helperFunctions.php');

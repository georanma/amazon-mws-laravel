<?php
use Georanma\AmazonMws\AmazonFulfillmentPreview;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-12-12 at 13:17:14.
 */
class AmazonFulfillmentPreviewTest extends PHPUnit_Framework_TestCase {

    /**
     * @var AmazonFulfillmentPreview
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        resetLog();
        $this->object = new AmazonFulfillmentPreview('testStore', true, null);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    public function testSetAddress(){
        $this->assertFalse($this->object->setAddress(null)); //can't be nothing
        $this->assertFalse($this->object->setAddress('address')); //can't be a string
        $this->assertFalse($this->object->setAddress(array())); //can't be empty

        $check = parseLog();
        $this->assertEquals('Tried to set address to invalid values',$check[1]);
        $this->assertEquals('Tried to set address to invalid values',$check[2]);
        $this->assertEquals('Tried to set address to invalid values',$check[3]);

        $a1 = array();
        $a1['Name'] = 'Name';
        $a1['Line1'] = 'Line1';
        $a1['Line2'] = 'Line2';
        $a1['Line3'] = 'Line3';
        $a1['DistrictOrCounty'] = 'DistrictOrCounty';
        $a1['City'] = 'City';
        $a1['StateOrProvinceCode'] = 'StateOrProvinceCode';
        $a1['CountryCode'] = 'CountryCode';
        $a1['PostalCode'] = 'PostalCode';
        $a1['PhoneNumber'] = 'PhoneNumber';

        $this->assertNull($this->object->setAddress($a1));

        $o = $this->object->getOptions();
        $this->assertArrayHasKey('Address.Name',$o);
        $this->assertEquals('Name',$o['Address.Name']);
        $this->assertArrayHasKey('Address.Line1',$o);
        $this->assertEquals('Line1',$o['Address.Line1']);
        $this->assertArrayHasKey('Address.Line2',$o);
        $this->assertEquals('Line2',$o['Address.Line2']);
        $this->assertArrayHasKey('Address.Line3',$o);
        $this->assertEquals('Line3',$o['Address.Line3']);
        $this->assertArrayHasKey('Address.DistrictOrCounty',$o);
        $this->assertEquals('DistrictOrCounty',$o['Address.DistrictOrCounty']);
        $this->assertArrayHasKey('Address.City',$o);
        $this->assertEquals('City',$o['Address.City']);
        $this->assertArrayHasKey('Address.StateOrProvinceCode',$o);
        $this->assertEquals('StateOrProvinceCode',$o['Address.StateOrProvinceCode']);
        $this->assertArrayHasKey('Address.CountryCode',$o);
        $this->assertEquals('CountryCode',$o['Address.CountryCode']);
        $this->assertArrayHasKey('Address.PostalCode',$o);
        $this->assertEquals('PostalCode',$o['Address.PostalCode']);
        $this->assertArrayHasKey('Address.PhoneNumber',$o);
        $this->assertEquals('PhoneNumber',$o['Address.PhoneNumber']);

        $a2 = array();
        $a2['Name'] = 'Name2';
        $a2['Line1'] = 'Line1-2';
        $a2['City'] = 'City2';
        $a2['StateOrProvinceCode'] = 'StateOrProvinceCode2';
        $a2['CountryCode'] = 'CountryCode2';
        $a2['PostalCode'] = 'PostalCode2';

        $this->assertNull($this->object->setAddress($a2)); //testing reset

        $o2 = $this->object->getOptions();
        $this->assertArrayHasKey('Address.Name',$o2);
        $this->assertEquals('Name2',$o2['Address.Name']);
        $this->assertNull($o2['Address.Line2']);
        $this->assertNull($o2['Address.Line3']);
        $this->assertNull($o2['Address.DistrictOrCounty']);
        $this->assertNull($o2['Address.PhoneNumber']);

    }

    public function testSetItems(){
        $this->assertFalse($this->object->setItems(null)); //can't be nothing
        $this->assertFalse($this->object->setItems('item')); //can't be a string
        $this->assertFalse($this->object->setItems(array())); //can't be empty

        $break = array();
        $break[0]['Bork'] = 'bork bork';

        $this->assertFalse($this->object->setItems($break)); //missing seller sku

        $break[0]['SellerSKU'] = 'some sku';

        $this->assertFalse($this->object->setItems($break)); //missing item id

        $break[0]['SellerFulfillmentOrderItemId'] = 'some ID';

        $this->assertFalse($this->object->setItems($break)); //missing quantity

        $check = parseLog();
        $this->assertEquals('Tried to set Items to invalid values',$check[1]);
        $this->assertEquals('Tried to set Items to invalid values',$check[2]);
        $this->assertEquals('Tried to set Items to invalid values',$check[3]);
        $this->assertEquals('Tried to set Items with invalid array',$check[4]);
        $this->assertEquals('Tried to set Items with invalid array',$check[5]);
        $this->assertEquals('Tried to set Items with invalid array',$check[6]);

        $i = array();
        $i[0]['SellerSKU'] = 'SellerSKU';
        $i[0]['SellerFulfillmentOrderItemId'] = 'SellerFulfillmentOrderItemId';
        $i[0]['Quantity'] = 'Quantity';
        $i[1]['SellerSKU'] = 'SellerSKU2';
        $i[1]['SellerFulfillmentOrderItemId'] = 'SellerFulfillmentOrderItemId2';
        $i[1]['Quantity'] = 'Quantity2';

        $this->assertNull($this->object->setItems($i));

        $o = $this->object->getOptions();
        $this->assertArrayHasKey('Items.member.1.SellerSKU',$o);
        $this->assertEquals('SellerSKU',$o['Items.member.1.SellerSKU']);
        $this->assertArrayHasKey('Items.member.1.SellerFulfillmentOrderItemId',$o);
        $this->assertEquals('SellerFulfillmentOrderItemId',$o['Items.member.1.SellerFulfillmentOrderItemId']);
        $this->assertArrayHasKey('Items.member.1.Quantity',$o);
        $this->assertEquals('Quantity',$o['Items.member.1.Quantity']);
        $this->assertArrayHasKey('Items.member.2.SellerSKU',$o);
        $this->assertEquals('SellerSKU2',$o['Items.member.2.SellerSKU']);
        $this->assertArrayHasKey('Items.member.2.SellerFulfillmentOrderItemId',$o);
        $this->assertEquals('SellerFulfillmentOrderItemId2',$o['Items.member.2.SellerFulfillmentOrderItemId']);
        $this->assertArrayHasKey('Items.member.2.Quantity',$o);
        $this->assertEquals('Quantity2',$o['Items.member.2.Quantity']);

        $i2 = array();
        $i2[0]['SellerSKU'] = 'NewSellerSKU';
        $i2[0]['SellerFulfillmentOrderItemId'] = 'NewSellerFulfillmentOrderItemId';
        $i2[0]['Quantity'] = 'NewQuantity';

        $this->assertNull($this->object->setItems($i2)); //will cause reset

        $o2 = $this->object->getOptions();
        $this->assertArrayHasKey('Items.member.1.SellerSKU',$o2);
        $this->assertEquals('NewSellerSKU',$o2['Items.member.1.SellerSKU']);
        $this->assertArrayHasKey('Items.member.1.SellerFulfillmentOrderItemId',$o2);
        $this->assertEquals('NewSellerFulfillmentOrderItemId',$o2['Items.member.1.SellerFulfillmentOrderItemId']);
        $this->assertArrayHasKey('Items.member.1.Quantity',$o2);
        $this->assertEquals('NewQuantity',$o2['Items.member.1.Quantity']);
        $this->assertArrayNotHasKey('Items.member.2.SellerSKU',$o2);
        $this->assertArrayNotHasKey('Items.member.2.SellerFulfillmentOrderItemId',$o2);
        $this->assertArrayNotHasKey('Items.member.2.Quantity',$o2);
    }

    public function testSetShippingSpeeds(){
        $this->assertFalse($this->object->setShippingSpeeds(null)); //can't be nothing
        $this->assertFalse($this->object->setShippingSpeeds(5)); //can't be an int

        $list = array('Standard','Expedited','Priority');
        $this->assertNull($this->object->setShippingSpeeds($list));

        $o = $this->object->getOptions();
        $this->assertArrayHasKey('ShippingSpeedCategories.1',$o);
        $this->assertEquals('Standard',$o['ShippingSpeedCategories.1']);
        $this->assertArrayHasKey('ShippingSpeedCategories.2',$o);
        $this->assertEquals('Expedited',$o['ShippingSpeedCategories.2']);
        $this->assertArrayHasKey('ShippingSpeedCategories.3',$o);
        $this->assertEquals('Priority',$o['ShippingSpeedCategories.3']);

        $this->assertNull($this->object->setShippingSpeeds('Standard')); //will cause reset
        $o2 = $this->object->getOptions();
        $this->assertArrayHasKey('ShippingSpeedCategories.1',$o2);
        $this->assertEquals('Standard',$o2['ShippingSpeedCategories.1']);
        $this->assertArrayNotHasKey('ShippingSpeedCategories.2',$o2);
        $this->assertArrayNotHasKey('ShippingSpeedCategories.3',$o2);

        $this->object->resetShippingSpeeds();
        $o3 = $this->object->getOptions();
        $this->assertArrayNotHasKey('ShippingSpeedCategories.1',$o3);
    }

    public function testFetchPreview(){
        resetLog();
        $this->object->setMock(true,'fetchPreview.xml');

        $this->assertFalse($this->object->fetchPreview()); //no address set yet

        $a = array();
        $a['Name'] = 'Name';
        $a['Line1'] = 'Line1';
        $a['City'] = 'City';
        $a['StateOrProvinceCode'] = 'StateOrProvinceCode';
        $a['CountryCode'] = 'CountryCode';
        $a['PostalCode'] = 'PostalCode';
        $this->object->setAddress($a);
        $this->assertFalse($this->object->fetchPreview()); //no items set yet

        $i = array();
        $i[0]['SellerSKU'] = 'SellerSKU';
        $i[0]['SellerFulfillmentOrderItemId'] = 'SellerFulfillmentOrderItemId';
        $i[0]['Quantity'] = 'Quantity';
        $this->object->setItems($i);
        $this->assertNull($this->object->fetchPreview());

        $check = parseLog();
        $this->assertEquals('Single Mock File set: fetchPreview.xml',$check[1]);
        $this->assertEquals('Address must be set in order to create a preview',$check[2]);
        $this->assertEquals('Items must be set in order to create a preview',$check[3]);
        $this->assertEquals('Fetched Mock File: mock/fetchPreview.xml',$check[4]);

        return $this->object;
    }

    /**
     * @depends testFetchPreview
     */
    public function testGetPreview($o){
        $list = $o->getPreview();

        $p1 = $o->getPreview(0);
        $p2 = $o->getPreview(1);

        $this->assertEquals($p1,$list[0]);
        $this->assertEquals($p2,$list[1]);

        $x = array();
        $x1 = array();
        $x1['EstimatedShippingWeight']['Unit'] = 'POUNDS';
        $x1['EstimatedShippingWeight']['Value'] = '12';
        $x1['ShippingSpeedCategory'] = 'Expedited';
        $x1['FulfillmentPreviewShipments'][0]['LatestShipDate'] = '2010-07-14T00:30:00Z';
        $x1['FulfillmentPreviewShipments'][0]['LatestArrivalDate'] = '2010-07-16T06:59:59Z';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][0]['EstimatedShippingWeight']['Unit'] = 'POUNDS';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][0]['EstimatedShippingWeight']['Value'] = '5';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][0]['SellerSKU'] = 'SampleSKU1';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][0]['SellerFulfillmentOrderItemId'] = 'mws-test-query-20100713023406723-2';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][0]['ShippingWeightCalculationMethod'] = 'Package';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][0]['Quantity'] = '2';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][1]['EstimatedShippingWeight']['Unit'] = 'POUNDS';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][1]['EstimatedShippingWeight']['Value'] = '0.290';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][1]['SellerSKU'] = 'SampleSKU2';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][1]['SellerFulfillmentOrderItemId'] = 'mws-test-query-20100713023406723-1';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][1]['ShippingWeightCalculationMethod'] = 'Package';
        $x1['FulfillmentPreviewShipments'][0]['FulfillmentPreviewItems'][1]['Quantity'] = '1';
        $x1['FulfillmentPreviewShipments'][0]['EarliestShipDate'] = '2010-07-14T00:30:00Z';
        $x1['FulfillmentPreviewShipments'][0]['EarliestArrivalDate'] = '2010-07-15T07:00:00Z';
        $x1['EstimatedFees'][0]['CurrencyCode'] = 'USD';
        $x1['EstimatedFees'][0]['Value'] = '2.25';
        $x1['EstimatedFees'][0]['Name'] = 'FBAPerUnitFulfillmentFee';
        $x1['EstimatedFees'][1]['CurrencyCode'] = 'USD';
        $x1['EstimatedFees'][1]['Value'] = '4.75';
        $x1['EstimatedFees'][1]['Name'] = 'FBAPerOrderFulfillmentFee';
        $x1['EstimatedFees'][2]['CurrencyCode'] = 'USD';
        $x1['EstimatedFees'][2]['Value'] = '6.60';
        $x1['EstimatedFees'][2]['Name'] = 'FBATransportationFee';
        $x1['OrderUnfulfillableReasons'][0] = 'Because.';
        $x1['IsFulfillable'] = 'true';
        $x2 = array();
        $x2['EstimatedShippingWeight'] = $x1['EstimatedShippingWeight'];
        $x2['ShippingSpeedCategory'] = 'Standard';
        $x2['FulfillmentPreviewShipments'] = $x1['FulfillmentPreviewShipments'];
        $x2['FulfillmentPreviewShipments'][0]['LatestArrivalDate'] = '2010-07-19T06:59:59Z';
        $x2['EstimatedFees'] = $x1['EstimatedFees'];
        $x2['UnfulfillablePreviewItems'][0]['SellerSKU'] = '123';
        $x2['UnfulfillablePreviewItems'][0]['SellerFulfillmentOrderItemId'] = 'ABC';
        $x2['UnfulfillablePreviewItems'][0]['Quantity'] = '1';
        $x2['UnfulfillablePreviewItems'][0]['ItemUnfulfillableReasons'] = 'Because.';
        $x2['IsFulfillable'] = 'true';
        $x[0] = $x1;
        $x[1] = $x2;

        $this->assertEquals($x,$list);

        $this->assertFalse($this->object->getPreview()); //not fetched for this object yet
    }

    /**
     * @depends testFetchPreview
     */
    public function testGetEstimatedWeight($o){
        $this->assertFalse($o->getEstimatedWeight(null)); //can't be null
        $this->assertFalse($o->getEstimatedWeight('five')); //can't be a string
        $this->assertFalse($o->getEstimatedWeight(-5)); //can't be negative

        $test1 = $o->getEstimatedWeight(0); //no mode
        $this->assertEquals('12',$test1);
        $test2 = $o->getEstimatedWeight(0,0); //mode 0 = default
        $this->assertEquals('12',$test2);
        $test3 = $o->getEstimatedWeight(0,1); //mode 1 = unit
        $this->assertEquals('POUNDS',$test3);
        $test4 = $o->getEstimatedWeight(0,2); //mode 1 = unit
        $x = array('Unit'=>'POUNDS','Value'=>'12');
        $this->assertEquals($x,$test4);


        $this->assertFalse($this->object->getEstimatedWeight(0)); //not fetched for this object yet
    }

}

require_once(__DIR__.'/../helperFunctions.php');

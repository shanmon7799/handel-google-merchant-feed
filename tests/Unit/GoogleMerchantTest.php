<?php

namespace Tests\Unit;

use App\Http\Service\GoogleMerchant;
use PHPUnit\Framework\TestCase;

class GoogleMerchantTest extends TestCase
{
    private $xml;

    public function setUp(): void
    {
        parent::setUp();
        // prepare xml file
        $url = 'https://gist.githubusercontent.com/chivincent-rosetta/0ff2bc5101d391a47a3741fdffa17c3f/raw/658c627b037ed60322e3123af329042a01dff319/product_feed.xml';
        $this->xml = simplexml_load_file($url);
    }

    public function testFromXml()
    {
        // arrange
        GoogleMerchant::fromXml($this->xml);

        // act
        $xmlFormatted = GoogleMerchant::$_xmlData;

        // assert
        $this->assertEquals($xmlFormatted, $this->xml);
    }

    public function testGetTitle()
    {
        // arrange
        $googleMerchant = GoogleMerchant::fromXml($this->xml);

        // act
        $title = $googleMerchant->getTitle();

        // assert
        $this->assertEquals($title, '《有品味的營養口糧》');
    }

    public function testSetTitle()
    {
        // arrange
        $expect = '波卡';
        $googleMerchant = GoogleMerchant::fromXml($this->xml);

        // act
        $googleMerchant->setTitle($expect);
        $title = $googleMerchant->getTitle();

        // assert
        $this->assertEquals($title, $expect);
    }

    public function testGetDescription()
    {
        // arrange
        $googleMerchant = GoogleMerchant::fromXml($this->xml);

        // act
        $description = $googleMerchant->getDescription();

        // assert
        $this->assertEquals($description, '《有品味的營養口糧》-La PÂTISSERIE de WACA');
    }

    public function testSetDescription()
    {
        // arrange
        $expect = '卡滋';
        $googleMerchant = GoogleMerchant::fromXml($this->xml);

        // act
        $googleMerchant->setDescription($expect);
        $description = $googleMerchant->getDescription();

        // assert
        $this->assertEquals($description, $expect);
    }

    public function testToXml()
    {
        // arrange
        $googleMerchant = GoogleMerchant::fromXml($this->xml);

        // act
        $result = $googleMerchant->toXml();

        // assert
        $this->assertTrue($result);
    }
}

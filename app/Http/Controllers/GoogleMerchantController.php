<?php

namespace App\Http\Controllers;

use App\Http\Service\GoogleMerchant;

class GoogleMerchantController extends Controller
{
    protected $googleMerchant;

    public function __construct(GoogleMerchant $googleMerchant)
    {
        $this->googleMerchantSer = $googleMerchant;
    }

    public function index()
    {
        $xml = $this->fetchTestXml();
        $googleMerchant = GoogleMerchant::fromXml($xml);

        return $googleMerchant->getTitle();
    }

    public function fetchTestXml()
    {
        $url = 'https://gist.githubusercontent.com/chivincent-rosetta/0ff2bc5101d391a47a3741fdffa17c3f/raw/658c627b037ed60322e3123af329042a01dff319/product_feed.xml';
        $xml = simplexml_load_file($url);

        return $xml;
    }
}

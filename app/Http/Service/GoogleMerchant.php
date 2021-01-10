<?php

namespace App\Http\Service;

class GoogleMerchant
{
    public static $_xmlData;

    /**
     * @param string $xml
     *
     * @return self
     */
    public static function fromXml($xml): self
    {
        self::$_xmlData = $xml;

        return new self;
    }
}

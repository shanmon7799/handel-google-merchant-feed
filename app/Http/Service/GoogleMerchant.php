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

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return (string)self::$_xmlData->xpath('//g:title')[0];
    }

    /**
     * @param string $productTitle
     */
    public function setTitle($productTitle)
    {
        foreach (self::$_xmlData->xpath('//g:title') as $title) {
            (array)$title[0] = $productTitle;
        }
    }
}

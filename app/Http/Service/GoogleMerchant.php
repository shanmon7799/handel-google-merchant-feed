<?php

namespace App\Http\Service;

class GoogleMerchant
{
    public static $_xmlData;

    /**
     * Cache xml data and return self instance
     *
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
     * Get item title from google merchant feed xml file
     * maximum string 150
     *
     * @return string
     */
    public function getTitle(): string
    {
        return (string)self::$_xmlData->xpath('//g:title')[0];
    }

    /**
     *
     * Modify item title from google merchant feed xml file
     * maximum string 150
     *
     * @param string $productTitle
     */
    public function setTitle($productTitle)
    {
        foreach (self::$_xmlData->xpath('//g:title') as $title) {
            (array)$title[0] = $productTitle;
        }
    }

    /**
     * Get item description from google merchant feed xml file
     * maximum string 500
     *
     * @return string
     */
    public function getDescription(): string
    {
        return (string)self::$_xmlData->xpath('//g:description')[0];
    }

    /**
     *
     * Modify item description from google merchant feed xml file
     * maximum string 500
     *
     * @param string $productDescription
     */
    public function setDescription($productDescription)
    {
        foreach (self::$_xmlData->xpath('//g:description') as $description) {
            (array)$description[0] = $productDescription;
        }
    }

    /**
     * Get item price from google merchant feed xml file
     *
     * @return string
     */
    public function getPrice(): string
    {
        return trim(self::$_xmlData->xpath('//g:price')[0]);
    }

    /**
     *
     * Modify item price from google merchant feed xml file
     *
     * @param string $productPrice
     */
    public function setPrice($productPrice)
    {
        foreach (self::$_xmlData->xpath('//g:price') as $price) {
            (array)$price[0] = $productPrice;
        }
    }

    /**
     * Save as Xml file
     *
     * @return string
     */
    public function toXml(): bool
    {
        return self::$_xmlData->saveXML('file.xml');
    }
}

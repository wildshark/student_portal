<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 20/03/2019
 * Time: 8:07 AM
 */

function currency($from, $to, $amount)
{
    $content = file_get_contents('https://www.google.com/finance/converter?a='.$amount.'&from='.$from.'&to='.$to);

    $doc = new DOMDocument;
    @$doc->loadHTML($content);
    $xpath = new DOMXpath($doc);

    $result = $xpath->query('//*[@id="currency_converter_result"]/span')->item(0)->nodeValue;

    return str_replace(' '.$to, '', $result);
}

echo currency('USD', 'EUR', 1); // returns 0.7216
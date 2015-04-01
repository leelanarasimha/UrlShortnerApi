<?php
namespace Leela\services;

use Leela\Contracts\UrlShortnerInterface;
use Leela\Traits\UrlShortnerTrait;

class UrlShortner implements UrlShortnerInterface
{
    use UrlShortnerTrait;

    private $api_key;
    private $url = 'https://www.googleapis.com/urlshortener/v1/url';

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    public function makeShort($value)
    {
        if (!$this->checkValidUrl($value)) {
            throw new \Exception('Invalid Url');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("longUrl" => $value)));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, TRUE);
        if (isset($response['id']) && $response['id'] != '') {
            return $response['id'];
        } else {
            throw new \Exception('Cannot shorten the url');
        }
    }

    public function makeLong($value, $total_details = FALSE)
    {
        if (!$this->checkValidUrl($value)) {
            throw new \Exception('Invalid Url');
        }

        $url = $this->url . '?shortUrl=' . urlencode($value) . '&projection=FULL&key=' . $this->api_key;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, TRUE);

        if (isset($response['longUrl']) && $response['longUrl'] != '') {
            if ($total_details) return $response;
            return $response['longUrl'];
        } else {
            throw new \Exception('Cannot Get Details');
        }
    }
}


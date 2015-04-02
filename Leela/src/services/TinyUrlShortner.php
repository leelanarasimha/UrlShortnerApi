<?php
namespace Leela\services;

use Leela\Contracts\UrlShortnerInterface;
use Leela\Traits\UrlShortnerTrait;

class TinyUrlShortner implements UrlShortnerInterface
{
    use UrlShortnerTrait;
    private $api_url = 'http://tiny-url.info/api/v1/random';
    private $api_key;

    /**
     * Constructor
     * @param $api_key
     */
    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * Converts Long Url into the Short Url
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public function makeShort($value)
    {
        if (!$this->checkValidUrl($value)) {
            throw new \Exception('Invalid Url');
        }

        $curl = curl_init();
        $post_data = array('format' => 'json',
            'apikey' => $this->api_key,
            'url' => $value);

        curl_setopt($curl, CURLOPT_URL, $this->api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($curl);
        curl_close($curl);

        if ($result) {
            $data = json_decode($result, TRUE);
            if (strtolower($data['state']) == 'ok') {
                return $data['shorturl'];
            } else {
                throw new \Exception('Cannot be converted to short url');
            }
        }
    }

    /**
     * COnverts the short url into long url
     * @param $value
     * @param bool $total_details
     * @return mixed
     * @throws \Exception
     */
    public function makeLong($value, $total_details = FALSE)
    {
        if (!$this->checkValidUrl($value)) {
            throw new \Exception('Invalid Url');
        }

        $header = get_headers($value, 1);
        if ($header) {
            if (isset($header['Location'])) {
                return $header['Location'];
            } else if (isset($header['location'])) {
                return $header['location'];
            } else {
                throw new \Exception('Unable to find the long url');
            }
        }
        throw new \Exception('Unable to get the details from the url');
    }
}
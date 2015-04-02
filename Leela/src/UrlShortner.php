<?php
namespace Leela;

use Leela\Contracts\UrlShortnerInterface;

class UrlShortner {
    private $shortnerType;

    /**
     * Constructor
     * @param UrlShortnerInterface $urlShortnerInterface
     */
    public function __construct(UrlShortnerInterface $urlShortnerInterface) {
        $this->shortnerType = $urlShortnerInterface;
    }

    /**
     * Gets the Long Url
     * @param $url
     * @param bool $total_details
     * @return mixed
     */
    public function getLongUrl($url, $total_details = FALSE) {
        return $this->shortnerType->makeLong($url, $total_details);
    }

    /**
     * Gets the Short Url
     * @param $url
     * @return mixed
     */
    public function getShortUrl($url) {
        return $this->shortnerType->makeShort($url);
    }
}
<?php
namespace Leela\Traits;

trait UrlShortnerTrait {
    public function checkValidUrl($url) {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
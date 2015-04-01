<?php
namespace Leela\Contracts;

interface UrlShortnerInterface {
    public function makeshort($value);
    public function makeLong($value, $total_details);
}
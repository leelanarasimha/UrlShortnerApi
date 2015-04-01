<?php
require 'vendor/autoload.php';

$urlshortner = new \Leela\services\UrlShortner('AIzaSyD3oFLb-U5ouYyV2b57Sjnn81shlTI3Hc0');
try {
    echo $urlshortner->makeLong('http://goo.gl/mR2d');
} catch (Exception $e) {
    echo $e->getMessage();
}
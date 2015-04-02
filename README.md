# UrlShortnerApi

URL Shortner API shortens the url with Google short service and also TinyUrl shortening service.

It takes the long url and converts it into the short url.

Uses Strategy Design Pattern

It also takes the short url and sends the statistics and also the long url.

Begin by installing this package through Composer. Edit your project's `composer.json` file to require`.

	"require": {
	"leela/urlshortnerapi": "1.0"
	}


Next, update Composer from the Terminal:

    composer update
    
That's it! You're all set to go. 
    
## Usage for tiny url Shorten
    <?php

    $tinyUrlInstance = new \Leela\services\TinyUrlShortner(TINYURL_API_KEY);
    $urlshortner = new Leela\UrlShortner($tinyUrlInstance);
    try {
        echo $urlshortner->getLongUrl($shortUrl, $total_options);
        echo $urlshortner->getShortUrl($longUrl);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
    
## Usage for Google url Shorten
    <?php

    $googleUrlInstance = new \Leela\services\GoogleUrlShortner(Google_API_KEY);
    $urlshortner = new Leela\UrlShortner($googleUrlInstance);
    try {
        echo $urlshortner->getLongUrl($shortUrl, $total_options);
        echo $urlshortner->getShortUrl($longUrl);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


## Methods

    getLongUrl($shortUrl, $total_options);

    $shortUrl = Google Shorten Url or tiny shorten url

    $total_options = TRUE or FALSE;
    TRUE returns all the history list of the url
    FALSE returns only the public url;


    getShortUrl($longUrl)
    $longUrl - The actual url need to be shorten;

## Contributor
Leela Narasimha Reddy - leela@leelag.com

## Issues & Suggestions
Please report any bugs or feature requests here: https://github.com/leelanarasimha/UrlShortnerApi/issues

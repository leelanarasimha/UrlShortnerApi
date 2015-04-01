# UrlShortnerApi

URL Shortner API shortens the url with Google short service.

It takes the long url and converts it into the short url.

It also takes the short url and sends the statistics and also the long url.

Begin by installing this package through Composer. Edit your project's `composer.json` file to require`.

	"require-dev": {
	}


Next, update Composer from the Terminal:

    composer update --dev
    
That's it! You're all set to go. 
    
## Usage
    <?php

    $urlshortner = new \Leela\services\UrlShortner(GOOGLE API KEY);
    try {
        echo $urlshortner->makeLong($shorten Url, $total_options);
        echo $urlshortner->makeSHort($longUrl);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


## Methods

    makeLong($shortUrl, $total_options);

    $shortUrl = Google Shorten Url

    $total_options = TRUE or FALSE;
    TRUE returns all the history list of the url
    FALSE returns only the public url;


    makeShort($longUrl)
    $longUrl - The actual url need to be shorten;

## Contributor
Leela Narasimha Reddy - leela@leelag.com

## Issues & Suggestions
Please report any bugs or feature requests here: https://github.com/leelanarasimha/UrlShortnerApi/issues

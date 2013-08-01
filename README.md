# TwitterClient

[![Build Status](https://secure.travis-ci.org/desarrolla2/TwitterClient.png)](http://travis-ci.org/desarrolla2/TwitterClient)

A independent Twitter Client library. This library depends from RSSClient


## Installation

### With Composer

It is best installed it through [packagist](http://packagist.org/packages/desarrolla2/twitter-client) 
by including
`desarrolla2/twitter-client` in your project composer.json require:

``` json
    "require": {
        // ...
        "desarrolla2/twitter-client":  "dev-master"
    }
```

### Without Composer

You can also download it from [Github] (https://github.com/desarrolla2/TwitterClient), 
but no autoloader is provided so you'll need to register it with your own PSR-0 
compatible autoloader.

## Usage

### Without Cache

This example does not use any cache, so it probably will be too slow to be used on 
a website, you should implement your system cache, or use the cache system described below

``` php
    <?php

    use Desarrolla2\TwitterClient\TwitterClient;

    $client = new TwitterClient();
    $client->setScreenName('desarrolla2');

    $twits = $client->fetch(10);

```

### With Cache

This example uses the cache implemented by Seller desarrolla2/cache you must 
select the adapter depending on your needs, you can find all the info in the 
repository [Github] (https://github.com/desarrolla2/Cache).

``` php
    <?php

    use Desarrolla2\TwitterClient\TwitterClient;
    use Desarrolla2\RSSClient\RSSCacheClient;
    use Desarrolla2\Cache\Cache;
    use Desarrolla2\Cache\Adapter\NotCache;

    // It is important that you select and configure your cache adapter
    $rssCacheClient = new RSSCacheClient(new Cache(new File('/tmp')));

    $client = new TwitterClient(rssCacheClient);
    $client->setScreenName('desarrolla2');

    $twits = $client->fetch(10);

```

You can see how to configure desarrolla2/cache in its [README] (https://github.com/desarrolla2/Cache)

## Contact

You can contact with me on [twitter](https://twitter.com/desarrolla2).

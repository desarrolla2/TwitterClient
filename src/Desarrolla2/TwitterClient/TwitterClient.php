<?php

/**
 * This file is part of the TwitterClient proyect.
 * 
 * Copyright (c)
 * Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * 
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 */

namespace Desarrolla2\TwitterClient;

use Desarrolla2\TwitterClient\Util;
use Desarrolla2\TwitterClient\TwitterClientInterface;
use Desarrolla2\RSSClient\RSSClientInterface;

/**
 * 
 * Description of TwitterClient
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : TwitterClient.php , UTF-8
 * @date : Oct 9, 2012 , 10:25:35 PM
 */
class TwitterClient implements TwitterClientInterface
{

    /**
     * @var Desarrolla2\RSSClient\RSSClientInterface
     */
    protected $provider;

    /**
     * @var string
     */
    protected $screenName;

    /**
     * @var string
     */
    protected $searchQuery;

    /**
     * @var string
     */
    protected $urlScreenName = 'http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=';

    /**
     * @var string
     */
    protected $urlSearch = 'http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=';

    /**
     * @var array 
     */
    protected $twits = array();

    /**
     * @var string
     */

    const TWIT_LENGHT = 160;

    /**
     *
     * @param RSSClientInterface $client 
     */
    public function __construct(RSSClientInterface $client)
    {
        $this->setProvider($client);
    }

    /**
     *
     * @param RSSClientInterface $client 
     */
    public function setProvider(RSSClientInterface $client)
    {
        $this->provider = $client;
    }

    /**
     *
     * @param string $screenName 
     */
    public function setScreenName($screenName)
    {
        $this->screenName = (string) $screenName;
    }

    /**
     * count number of twits
     */
    public function count()
    {
        return count($this->twits);
    }

    /**
     * 
     */
    public function fetch($limit = 20)
    {
        $channelName = __CLASS__ . '_' . $this->screenName;
        $limit = (int) $limit;
        $this->provider->setFeed($this->getScreenNameUrl(), $channelName);
        $nodes = $this->provider->fetch($channelName, $limit);

        foreach ($nodes as $node) {
            $twit = new Twit();
            $twit->setText($this->parseText($node->getTitle()));
            $twit->setLink($node->getLink());
            $twit->setPubDate($node->getPubDate());
            $this->addTwit($twit);
        }

        return $this->getTwits($limit);
    }

    /**
     * 
     * @return Twit | false
     */
    public function fetchOne()
    {
        $twits = $this->fetch(1);
        if (count($twits)) {
            return $twits[0];
        }
        return false;
    }

    /**
     *
     * @param Twit $twit
     */
    protected function addTwit(Twit $twit)
    {
        array_push($this->twits, $twit);
    }

    /**
     *
     * @return string $screenName
     */
    protected function getScreenNameUrl()
    {
        return $this->urlScreenName . $this->screenName;
    }

    /**
     * Retrieves a $limit number of twits
     * 
     * @param int $limit
     * @return array $twits
     */
    protected function getTwits($limit = 20)
    {
        $limit = (int) $limit;
        $response = array();
        for ($i = 0; $i < $limit; $i++) {
            if (isset($this->twits[$i])) {
                array_push($response, $this->twits[$i]);
            }
        }
        return $response;
    }

    /**
     * Parse Twit Text: links, users, and hashtag
     * @param type $text
     * @return type 
     */
    protected function parseText($text)
    {
        $text = trim(substr($text, (strlen($this->screenName) + 2), self::TWIT_LENGHT));
        return Util::parseText($text);
    }

}

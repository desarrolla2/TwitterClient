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

/**
 * 
 * Description of TwitterClientInterface
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : TwitterClientInterface.php , UTF-8
 * @date : Oct 9, 2012 , 10:29:02 PM
 */
interface TwitterClientInterface
{

    /**
     *
     * @param RSSClientInterface $client 
     */
    public function setProvider(RSSClientInterface $client);

    /**
     *
     * @param string $screenName 
     */
    public function setScreenName($screenName);

    /**
     * count number of twits
     */
    public function count();

    /**
     * 
     */
    public function fetch($limit = 20);

    /**
     * 
     * @return Twit | false
     */
    public function fetchOne();
}

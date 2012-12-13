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

namespace Desarrolla2\TwitterClient\Test;

use Desarrolla2\TwitterClient\TwitterClient;
use Desarrolla2\RSSClient\RSSClient;
use Desarrolla2\RSSClient\RSSNode;

/**
 * 
 * Description of TwitterClientTest
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : TwitterClientTest.php , UTF-8
 * @date : Dec 13, 2012 , 10:56:08 PM
 */
class TwitterClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Desarrolla2\TwitterClient\TwitterClient
     */
    protected $client = null;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->client = new TwitterClient(new RSSClient());
        $this->client->setScreenName('desarrolla2');
    }

    /**
     * 
     */
    public function testGetLastTwit()
    {
        $stub = $this->getMock('\Desarrolla2\RSSClient\RSSClient');
        $stub->expects($this->any())
        ->method('fetch')
        ->will($this->returnValue(array( new RSSNode())));
        $this->client->setProvider($stub);
        $this->assertEquals(count($this->client->fetchOne()), 1);
    }

}

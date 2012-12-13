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

use Desarrolla2\TwitterClient\Twit;

/**
 * 
 * Description of TwitTest
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : TwitTest.php , UTF-8
 * @date : Dec 13, 2012 , 11:09:43 PM
 */
class TwitTest
{

    /**
     *
     * @var \Desarrolla2\TwitterClient\Twit
     */
    protected $twit;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->twit = new Twit();
    }

    /**
     * 
     */
    public function testSetText()
    {
        $text = 'text';
        $this->twit->setText($text);
        $this->assertEquals($this->twit->getText(), $text);
    }

}

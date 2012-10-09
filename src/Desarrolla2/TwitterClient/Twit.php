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
 * Description of Twit
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : Twit.php , UTF-8
 * @date : Oct 9, 2012 , 10:35:23 PM
 */
class Twit
{

    /**
     * @var string
     */
    protected $text = null;

    /**
     * @var string
     */
    protected $link = null;

    /**
     *
     * @var \DateTime
     */
    protected $pubDate = null;

    /**
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getText();
    }

    /**
     * 
     * @param string $string
     * @return string $string 
     */
    protected function doClean($string)
    {
        return $string;
    }

    /**
     *
     * @param string $text 
     */
    public function setText($text)
    {
        $this->text = $this->doClean($text);
    }

    /**
     *
     * @return string $text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     *
     * @param string $link 
     */
    public function setLink($link)
    {
        $this->link = $this->doClean($link);
    }

    /**
     *
     * @return string $link  
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     *
     * @param  string $date 
     */
    public function setPubDate(\DateTime $date)
    {
        $this->pubDate = $date;
    }

    /**
     *
     * @return DateTime $date 
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }

    public function getTimestamp()
    {
        if ($this->pubDate) {
            return $this->pubDate->getTimestamp();
        }
        return 0;
    }

}

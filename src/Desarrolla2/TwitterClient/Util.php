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
 * Description of Util
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : Util.php , UTF-8
 * @date : Oct 9, 2012 , 10:27:57 PM
 */
class Util
{
       /**
     * Parse Twit Text: links, users, and hashtag
     * @param type $text
     * @return type 
     */
    static public function parseText($text)
    {
        $text = (string) $text;
        // links
        $text = preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@', '<a href="$1">$1</a>', $text);
        // users         
        $text = preg_replace('(@([a-zA-Z0-9_]+))', '<a href="http://www.twitter.com/\1">\0</a>', $text);
        // hastag
        $text = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a href="http://search.twitter.com/search?q=%23\2">#\2</a>', $text);

        return $text;
    }
}

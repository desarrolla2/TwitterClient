<?php

/**
 * This file is part of the TwitterClient proyect.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Desarrolla2\TwitterClient;

/**
 *
 * Description of Util
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es>
 */
class Util
{
    /**
     * Parse Twit Text: links, users, and hashtag
     *
     * @param type $text
     * @return type
     */
    static public function parseText($text)
    {
        $text = (string)$text;
        // links
        $text = preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@', '<a href="$1">$1</a>', $text);
        // users         
        $text = preg_replace('(@([a-zA-Z0-9_]+))', '<a href="http://www.twitter.com/\1">\0</a>', $text);
        // hastag
        $text = preg_replace(
            '/(^|\s)#(\w*[a-zA-Z_]+\w*)/',
            '\1<a href="http://search.twitter.com/search?q=%23\2">#\2</a>',
            $text
        );

        return $text;
    }
}

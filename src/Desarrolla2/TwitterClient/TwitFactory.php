<?php
/**
 * This file is part of the symfony-madrid project.
 *
 * Copyright (c)
 *
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 */

namespace Desarrolla2\TwitterClient;


/**
 * Class TwitFactory
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 */

class TwitFactory
{
    /**
     * @var array
     */
    static private $attributes = array(
        'id',
        'text',
        'source',
        'truncated',
        'user',
        'created_at',
    );

    /**
     * @param $item
     * @return bool|Twit
     */
    static public function create($item)
    {
        if (!is_array($item)) {
            return false;
        }
        $twit = new Twit();

        foreach (self::$attributes as $attribute) {
            if (!isset($item[$attribute])) {
                continue;
            }
            $method = 'set' . ucfirst($attribute);
            $twit->$method($item[$attribute]);
        }

        return $twit;
    }

    /**
     * @param $items
     * @return bool|TwitCollection
     */
    static function createCollection($items)
    {
        if (!is_array($items)) {
            return false;
        }
        $collection = new TwitCollection();
        foreach ($items as $item) {
            $t = self::create($item);
            if (!$t) {
                continue;
            }
            $collection->append($t);
        }

        return $collection;
    }
}
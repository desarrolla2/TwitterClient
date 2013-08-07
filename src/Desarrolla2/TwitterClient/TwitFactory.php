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
        if (!is_object($item)) {
            return false;
        }
        $twit = new Twit();

        if ( isset($item->text)){
            $item->text = Util::parseText($item->text);
        }

        foreach (self::$attributes as $attribute) {
            if (!isset($item->$attribute)) {
                continue;
            }
            $method = 'set' . ucfirst(str_replace('_', '', $attribute));
            $twit->$method($item->$attribute);
        }

        return $twit;
    }

    /**
     * @param     $items
     * @param int $limit
     * @return bool|TwitCollection
     */
    static function createCollection($items, $limit = 20)
    {
        if (!is_array($items)) {
            return false;
        }
        $count = count($items);
        $collection = new TwitCollection();
        for ($i = 0; ($i < $count && $i < $limit); $i++) {
            if (!isset($items[$i])) {
                continue;
            }
            $item = $items[$i];
            $t = self::create($item);
            if (!$t) {
                continue;
            }
            $collection->append($t);
        }

        return $collection;
    }
}
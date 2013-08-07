<?php

/**
 * This file is part of the TwitterClient project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Desarrolla2\TwitterClient;

use Guzzle\Http\Client;
use Guzzle\Plugin\Oauth\OauthPlugin;

/**
 *
 * TwitterClient
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es>
 */

class TwitterClient implements TwitterClientInterface
{

    /**
     * @var \Guzzle\Http\Client
     */
    protected $handler;

    /**
     * @var string
     */
    protected $consumer_key;

    /**
     * @var string
     */
    protected $consumer_secret;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $token_secret;

    /**
     * @param string $consumer_key
     * @param string $consumer_secret
     * @param string $token
     * @param string $token_secret
     */
    public function __construct($consumer_key, $consumer_secret, $token, $token_secret)
    {
        $this->handler = new Client('https://api.twitter.com/{version}', array(
            'version' => '1.1'
        ));

        $this->handler->addSubscriber(
            new OauthPlugin(array(
                'consumer_key' => $consumer_key,
                'consumer_secret' => $consumer_secret,
                'token' => $token,
                'token_secret' => $token_secret
            ))
        );
    }

    /**
     * @param null $user
     * @return bool
     */
    public function getUserTimeLineLast($user = null)
    {
        $items = $this->getUserTimeLine($user, 1);
        if (!$items) {
            return false;
        }

        return $items->first();
    }

    /**
     * @param null $user
     * @param int  $limit
     * @return array|false
     */
    public function getUserTimeLine($user = null, $limit = 20)
    {
        $request = $this->handler->get('statuses/user_timeline.json');
        if ($user) {
            $request->getQuery()->set('screen_name', $user);
        }
        if ($limit) {
            $request->getQuery()->set('count', $limit);
        }
        $response = $request->send();
        if ($response->getStatusCode() != 200) {
            return false;
        }

        $items = json_decode($response->getBody());

        return TwitFactory::createCollection($items, $limit);
    }
}

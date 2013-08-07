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
     * Class Twit
     *
     * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
     */

/**
 * Class Twit
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 */
class Twit
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $truncated;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var \DateTime
     */
    protected $created_at;

    public function __toString(){
        return $this->getText();
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $truncated
     */
    public function setTruncated($truncated)
    {
        $this->truncated = $truncated;
    }

    /**
     * @return string
     */
    public function getTruncated()
    {
        return $this->truncated;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
}
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

use Desarrolla2\TwitterClient\Util;

/**
 * 
 * Description of UtilTest
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : UtilTest.php , UTF-8
 * @date : Oct 9, 2012 , 11:01:38 PM
 */
class UtilTest extends \PHPUnit_Framework_TestCase
{

    public function parseTextDataProvider()
    {
        return array(
            array('@desarrolla2', '<a href="http://www.twitter.com/desarrolla2">@desarrolla2</a>'),
            array('http://desarrolla2.com', '<a href="http://desarrolla2.com">http://desarrolla2.com</a>'),
            array('#desarrolla2', '<a href="http://search.twitter.com/search?q=%23desarrolla2">#desarrolla2</a>'),
        );
    }

    /**
     * @test
     * @dataProvider parseTextDataProvider
     */
    public function testParseText($test_case, $result)
    {
        $this->assertEquals(Util::parseText($test_case), $result);
    }

}

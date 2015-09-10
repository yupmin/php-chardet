<?php

namespace Yupmin\PHPChardet\Test;

use Yupmin\PHPChardet\ChardetOutputParser;

class ChardatOutputParserTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {

    }
    /**
     * @expectedException \Exception
     */
    public function testGetChardatContainerBeforeCallParse()
    {
        $chardetOutputParser = new ChardetOutputParser();
        $chardetOutputParser->getChardetContainer();
    }
}

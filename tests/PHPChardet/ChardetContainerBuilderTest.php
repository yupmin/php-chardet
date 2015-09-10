<?php

namespace Yupmin\PHPChardet\Test;

use Yupmin\PHPChardet\ChardetContainerBuilder;

class ChardetContainerBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testFilePath()
    {
        $chardetContainerBuilder = new ChardetContainerBuilder();

        $chardetContainer = $chardetContainerBuilder->build();
        $this->assertEquals(null, $chardetContainer->getFilePath());

        $chardetContainerBuilder->setFilePath('file path');
        $chardetContainer = $chardetContainerBuilder->build();

        $this->assertEquals('file path', $chardetContainer->getFilePath());
    }

    public function testCharset()
    {
        $chardetContainerBuilder = new ChardetContainerBuilder();

        $chardetContainer = $chardetContainerBuilder->build();
        $this->assertEquals(null, $chardetContainer->getCharset());

        $chardetContainerBuilder->setCharset('utf-8');
        $chardetContainer = $chardetContainerBuilder->build();

        $this->assertEquals('utf-8', $chardetContainer->getCharset());
    }

    public function testConfidence()
    {
        $chardetContainerBuilder = new ChardetContainerBuilder();

        $chardetContainer = $chardetContainerBuilder->build();
        $this->assertEquals(null, $chardetContainer->getConfidence());

        $chardetContainerBuilder->setConfidence(0.99);
        $chardetContainer = $chardetContainerBuilder->build();

        $this->assertEquals(0.99, $chardetContainer->getConfidence());
    }
}

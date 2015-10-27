<?php

namespace Yupmin\PHPChardet\Test;

use Yupmin\PHPChardet\ChardetCommandBuilder;
use Yupmin\PHPChardet\ChardetCommandRunner;

class ChardetCommandBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $filePath;

    public function setUp()
    {
        $this->filePath = __DIR__ . '/../fixtures/chardet-input.txt';
    }

    /**
     * @expectedException \Exception
     */
    public function testExceptionWithNonExistingFile()
    {
        $chardetCommandBuilder = new ChardetCommandBuilder();
        $chardetCommandBuilder->buildChardetCommandRunner('non existing path');
    }

    public function testBuilderCommand()
    {
        $chardetCommandBuilder = new ChardetCommandBuilder();
        $chardetCommandRunner = $chardetCommandBuilder->buildChardetCommandRunner($this->filePath);
        $equalsChardetCommandRunner = new ChardetCommandRunner($this->filePath);
        $this->assertEquals($equalsChardetCommandRunner, $chardetCommandRunner);
    }
}

<?php

namespace Yupmin\PHPChardet\Test;

use Yupmin\PHPChardet\ChardetCommandRunner;

class ChardetCommandRunnerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $outputPath;

    /**
     * @var string
     */
    private $filePath;

    public function setUp()
    {
        $this->filePath = __DIR__.'/../fixtures/chardet-input.txt';
        $this->outputPath = __DIR__.'/../fixtures/chardet-output.txt';
    }

    public function testRun()
    {
        $processMock = $this->getMockBuilder('Symfony\Component\Process\Process')
            ->disableOriginalConstructor()
            ->getMock();

        $processMock->method('run')
            ->willReturn(true);

        $processMock->method('getOutput')
            ->willReturn(file_get_contents($this->outputPath));

        $processMock->method('isSuccessful')
            ->willReturn(true);

        $processBuilderMock = $this->getMockBuilder('Symfony\Component\Process\ProcessBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $processBuilderMock->method('getProcess')
            ->willReturn($processMock);

        $chardetCommandRunner = new ChardetCommandRunner(
            $this->filePath,
            null,
            $processBuilderMock
        );

        $this->assertEquals(file_get_contents($this->outputPath), $chardetCommandRunner->run());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testRunException()
    {
        $processMock = $this->getMockBuilder('Symfony\Component\Process\Process')
            ->disableOriginalConstructor()
            ->getMock();
        $processMock->method('run')
            ->willReturn(true);
        $processMock->method('getErrorOutput')
            ->willReturn('Error');
        $processMock->method('isSuccessful')
            ->willReturn(false);
        $processBuilderMock = $this->getMockBuilder('Symfony\Component\Process\ProcessBuilder')
            ->disableOriginalConstructor()
            ->getMock();
        $processBuilderMock->method('getProcess')
            ->willReturn($processMock);
        $chardetCommandRunner = new ChardetCommandRunner(
            $this->filePath,
            null,
            $processBuilderMock
        );
        $chardetCommandRunner->run();
    }
}

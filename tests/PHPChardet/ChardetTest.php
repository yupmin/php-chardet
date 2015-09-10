<?php

namespace Yupmin\PHPChardet\Test;

use Yupmin\PHPChardet\Chardet;
use Yupmin\PHPChardet\ChardetContainer;

class ChardatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $utf8FilePath;

    /**
     * @var string
     */
    private $euckrFilePath;

    /**
     * @var string
     */
    private $emptyFilePath;

    public function setUp()
    {
        $this->utf8FilePath = __DIR__.'/../fixtures/subtitle-utf8.srt';
        $this->euckrFilePath = __DIR__.'/../fixtures/subtitle-euckr.srt';
        $this->emptyFilePath = __DIR__.'/../fixtures/chardet-input.txt';
    }

    public function testAnalyzeUTF8()
    {
        $chardet = new Chardet();
        $analyzeResult = $chardet->analyze($this->utf8FilePath);

        $utf8Result = new ChardetContainer();
        $utf8Result->setFilePath($this->utf8FilePath);
        $utf8Result->setCharset('utf-8');
        $utf8Result->setConfidence(0.99);

        $this->assertEquals($utf8Result, $analyzeResult);
    }

    public function testAnalyzeEucKR()
    {
        $chardet = new Chardet();
        $analyzeResult = $chardet->analyze($this->euckrFilePath);

        $euckrResult = new ChardetContainer();
        $euckrResult->setFilePath($this->euckrFilePath);
        $euckrResult->setCharset('euc-kr');
        $euckrResult->setConfidence(0.99);

        $this->assertEquals($euckrResult, $analyzeResult);
    }

    /**
     * @expectedException \Exception
     */
    public function testAnalyzeEmpty()
    {
        $chardet = new Chardet();
        $result = $chardet->analyze($this->emptyFilePath);
    }
}

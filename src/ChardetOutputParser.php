<?php

namespace Yupmin\PHPChardet;

use Yupmin\PHPChardet\ChardetContainerBuilder;

class ChardetOutputParser
{
    /**
     * @var string
     */
    private $parsedFilePath;

    /**
     * @var string
     */
    private $parsedCharset;

    /**
     * @var float
     */
    private $parsedConfidence;

    /**
     * @param string $output
     */
    public function parse($output)
    {
/* output case :
- 2.3.0
tests/fixtures/subtitle-test1.srt: EUC-KR with confidence 0.99
tests/fixtures/chardet-output.txt: no result
- 2.0.1
tests/fixtures/subtitle-test1.srt: EUC-KR (confidence: 0.99)
tests/fixtures/chardet-output.txt: None (confidence: 0.00) */
        if ((preg_match('/(.+): (.+) .+confidence:? ([^\)]+)/', $output, $matches) === 0)
            || (isset($matches[2]) && $matches[2] == 'None')) {
            throw new \Exception('This file is not analyzed.');
        }

        $this->parsedFilePath = $matches[1];
        $this->parsedCharset = strtolower($matches[2]);
        $this->parsedConfidence = (float) $matches[3];
    }

    public function getChardetContainer()
    {
        if ($this->parsedFilePath === null || $this->parsedCharset === null || $this->parsedConfidence === null) {
            throw new \Exception('You must run `parse` before running `getChardetContainer`');
        }

        $chardetContainerBuilder = new ChardetContainerBuilder();

        $chardetContainerBuilder->setFilePath($this->parsedFilePath);
        $chardetContainerBuilder->setCharset($this->parsedCharset);
        $chardetContainerBuilder->setConfidence($this->parsedConfidence);

        return $chardetContainerBuilder->build();
    }
}

<?php

namespace Yupmin\PHPChardet;

use Yupmin\PHPChardet\ChardetCommandBuilder;
use Yupmin\PHPChardet\ChardetOutputParser;

class Chardet
{
    /**
     * $param $filePath
     */
    public function analyze($filePath)
    {
        $chardetCommandBuilder = new ChardetCommandBuilder();
        $output = $chardetCommandBuilder->buildChardetCommandRunner($filePath)->run();

        $chardetOutputParser = new ChardetOutputParser();
        $chardetOutputParser->parse($output);

        return $chardetOutputParser->getChardetContainer();
    }
}

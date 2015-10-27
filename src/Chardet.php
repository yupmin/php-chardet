<?php

namespace Yupmin\PHPChardet;

class Chardet
{
    /**
     * @param string $filePath
     * @return ChardetContainer
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

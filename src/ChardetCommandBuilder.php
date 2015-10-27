<?php

namespace Yupmin\PHPChardet;

use Symfony\Component\Filesystem\Filesystem;

class ChardetCommandBuilder
{
    /**
     * @param string $filePath
     * @return ChardetCommandRunner
     * @throws \Exception
     */
    public function buildChardetCommandRunner($filePath)
    {
        $fileSystem = new Filesystem();
        if (! $fileSystem->exists($filePath)) {
            throw new \Exception('File doesn\'t exist');
        }

        if (is_dir($filePath)) {
            throw new \Exception('You must specify a filename, not a directory name');
        }

        return new ChardetCommandRunner($filePath);
    }
}

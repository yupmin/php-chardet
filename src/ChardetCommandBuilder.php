<?php

namespace Yupmin\PHPChardet;

use Yupmin\PHPChardet\ChardetCommandRunner;
use Symfony\Component\Filesystem\Filesystem;

class ChardetCommandBuilder
{
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

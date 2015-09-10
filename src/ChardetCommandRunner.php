<?php

namespace Yupmin\PHPChardet;

use Symfony\Component\Process\ProcessBuilder;

class ChardetCommandRunner
{
    protected $filePath;
    protected $processBuilder;
    protected $command = 'chardet';
    protected $arguments = array();

    public function __construct($filePath, array $arguments = null, $processBuilder = null)
    {
        $this->filePath = $filePath;

        if ($arguments !== null) {
            $this->arguments = $arguments;
        }

        if ($processBuilder === null) {
            $prefix = $this->arguments;
            array_unshift($prefix, $this->command);
            $this->processBuilder = ProcessBuilder::create()
                ->setPrefix($prefix);
        } else {
            $this->processBuilder = $processBuilder;
        }
    }

    public function run()
    {
        $this->processBuilder->add($this->filePath);
        $process = $this->processBuilder->getProcess();
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }

        return $process->getOutput();
    }
}

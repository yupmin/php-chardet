<?php

namespace Yupmin\PHPChardet;

use Symfony\Component\Process\ProcessBuilder;

class ChardetCommandRunner
{
    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var ProcessBuilder
     */
    protected $processBuilder;

    /**
     * @var string
     */
    protected $command = 'chardet';

    /**
     * @var array
     */
    protected $arguments = array();

    /**
     * @param string $filePath
     * @param array|null $arguments
     * @param ProcessBuilder|null $processBuilder
     */
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

    /**
     * @return string
     */
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

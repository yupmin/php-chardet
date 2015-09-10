<?php

namespace Yupmin\PHPChardet;

use Yupmin\PHPChardet\ChardetContainer;

class ChardetContainerBuilder
{
    /**
     * @var ChardetContainer
     */
    private $chardetContainer;

    public function __construct()
    {
        $this->chardetContainer = new ChardetContainer();
    }

    /**
     * @return ChardetContainer
     */
    public function build()
    {
        return $this->chardetContainer;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath)
    {
        $this->chardetContainer->setFilePath($filePath);
    }

    /**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->chardetContainer->setCharset($charset);
    }

    /**
     * @param string $confidence
     */
    public function setConfidence($confidence)
    {
        $this->chardetContainer->setConfidence($confidence);
    }
}

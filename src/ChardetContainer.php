<?php

namespace Yupmin\PHPChardet;

class ChardetContainer
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var string
     */
    private $charset;

    /**
     * @var float
     */
    private $confidence;

    /**
     * @return filepath
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @return charset
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @return float
     */
    public function getConfidence()
    {
        return $this->confidence;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * @param string $confidence
     */
    public function setConfidence($confidence)
    {
        $this->confidence = $confidence;
    }
}

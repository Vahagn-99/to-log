<?php

namespace SrcLab\AltLog\Contracts;

interface ToLog
{
    /**
     * Create and get the logger instance.
     *
     * @param string $name
     * @return \SrcLab\AltLog\Logger
     */
    public function file($name);
}

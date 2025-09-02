<?php

namespace Vahagn\ToLog\Contracts;

interface ToLog
{
    /**
     * Create and get the logger instance.
     *
     * @param string $name
     * @return \Vahagn\ToLog\Logger
     */
    public function file($name);
}

<?php

namespace Vahagn\ToLog\Support\Facades;

class ToLog extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Vahagn.to_log';
    }
}

<?php

if (!function_exists('to_log')) {
    /**
     * ToLog.
     *
     * @return \Vahagn\ToLog\Contracts\ToLog
     */
    function to_log()
    {
        return app(\Vahagn\ToLog\Contracts\ToLog::class);
    }
}

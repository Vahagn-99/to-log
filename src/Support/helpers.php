<?php

if (!function_exists('alt_log')) {
    /**
     * ToLog.
     *
     * @return \SrcLab\AltLog\Contracts\ToLog
     */
    function alt_log()
    {
        return app(\SrcLab\AltLog\Contracts\ToLog::class);
    }
}

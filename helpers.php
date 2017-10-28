<?php

if (!function_exists('swal')) {
    /**
     * @return RulWeb\Swal\Swal
     */
    function swal()
    {
        return app('swal');
    }
}

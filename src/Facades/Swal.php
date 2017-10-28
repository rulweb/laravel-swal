<?php

namespace RulWeb\Swal\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Swal extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'swal';
    }
}
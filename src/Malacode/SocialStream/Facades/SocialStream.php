<?php

namespace Malacode\SocialStream\Facades;

use Illuminate\Support\Facades\Facade;

class SocialStream extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'social_stream';
    }
}

<?php
namespace Antsfree\Antsearch\Src;

use Illuminate\Support\Facades\Facade;

class Antsearch extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'antsearch';
    }
}
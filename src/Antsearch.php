<?php
namespace Antsfree\Antsearch;

use Illuminate\Support\Facades\Facade;

class Antsearch extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'antsearch';
    }
}
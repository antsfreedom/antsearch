<?php
namespace Antsfree;

use Illuminate\Support\Facades\Facade;

class Antsearch extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'antsearch';
    }
}
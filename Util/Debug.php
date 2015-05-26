<?php

namespace Smada\SymfonyToolsBundle\Util;

use Doctrine\Common\Util\Debug as SymfonyDebug;

class Debug
{
    public static function dump($data, $die = false)
    {
        echo "<pre>";
        SymfonyDebug::dump($data,2);
        echo "</pre>";

        if ($die)
            die;
    }
} 
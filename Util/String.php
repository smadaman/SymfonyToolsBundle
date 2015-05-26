<?php

namespace Smada\SymfonyToolsBundle\Util;

class String
{
    public static function stripAllWhitespace($string)
    {
        return preg_replace('/ +/', '', $string);
    }

    public static function toClass($string)
    {
        // First remove any special chars
        $string = self::stripAllSpecialChars($string, true);

        // Split camel case
        $amount = preg_match_all('/((?:^|[A-Z])[a-z]+)/', $string, $matches);
        if ($amount > 0)
            $string = implode(" ", $matches[0]);

        // put it to lower case
        $string = strtolower($string);

        // Replace spaces with "-" for a class name
        $string = str_replace(' ', '-', $string);

        // Return the resulting string
        return $string;
    }

    public static function stripAllSpecialChars($string, $replaceWithSpaces = false)
    {
        // Strip HTML Tags
        $string = strip_tags($string);

        // Clean up things like &amp;
        $string = html_entity_decode($string);

        // Strip out any url-encoded stuff
        $string = urldecode($string);

        // Replace non-AlNum characters with space
        $string = preg_replace('/[^A-Za-z0-9\s+]/', $replaceWithSpaces ? ' ' : '', $string);

        // Replace Multiple spaces with single space
        $string = preg_replace('/ +/', ' ', $string);

        // Trim the string of leading/trailing space
        $string = trim($string);

        // Return the resulting string
        return $string;
    }
} 
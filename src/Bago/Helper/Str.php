<?php

namespace Bago\Helper;

class Str
{
    public static function camelCase($string)
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $string))));
    }

    public static function snakeCase($string)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }

    public static function studlyCase($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    public static function random($length = 16)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);

        return (substr($haystack, 0, $length) === $needle);
    }

    public static function plural(string $string)
    {
        $plural = [
            '(quiz)$'               => "$1zes",
            '^(ox)$'                => "$1en",
            '([m|l])ouse$'          => "$1ice",
            '(matr|vert|ind)ix|ex$' => "$1ices",
            '(x|ch|ss|sh)$'         => "$1es",
            '([^aeiouy]|qu)y$'      => "$1ies",
            '(hive)$'               => "$1s",
            '(?:([^f])fe|([lr])f)$' => "$1$2ves",
            '(shea|lea|loa|thie)f$' => "$1ves",
            'sis$'                  => "ses",
            '([ti])um$'             => "$1a",
            '(tomat|potat|ech|her|vet)o$' => "$1oes",
            '(bu)s$'                => "$1ses",
            '(alias)$'              => "$1es",
            '(octop)us$'            => "$1i",
            '(ax|test)is$'          => "$1es",
            '(us)$'                 => "$1es",
            '([^s]+)$'              => "$1s"
        ];

        foreach ($plural as $rule => $replacement) {
            if (preg_match("/$rule$/i", $string)) {
                return preg_replace("/$rule$/i", $replacement, $string);
            }
        }

        return $string;
    }

    public static function singular(string $string)
    {
        $singular = [
            '(quiz)zes$'             => "$1",
            '(matr)ices$'            => "$1ix",
            '(vert|ind)ices$'        => "$1ex",
            '^(ox)en$'               => "$1",
            '(alias)es$'             => "$1",
            '(octop|vir)i$'          => "$1us",
            '(cris|ax|test)es$'      => "$1is",
            '(shoe)s$'               => "$1",
            '(o)es$'                 => "$1",
            '(bus)es$'               => "$1",
            '([m|l])ice$'            => "$1ouse",
            '(x|ch|ss|sh)es$'        => "$1",
            '(m)ovies$'              => "$1ovie",
            '(s)eries$'              => "$1eries",
            '([^aeiouy]|qu)ies$'     => "$1y",
            '([lr])ves$'             => "$1f",
            '(tive)s$'               => "$1",
            '(hive)s$'               => "$1",
            '([^f])ves$'             => "$1fe",
            '(^analy)ses$'           => "$1sis",
            '(analy|ba|diagno|parenthe|progno|synop|the)ses$' => "$1sis",
            '([ti])a$'               => "$1um",
            '(n)ews$'                => "$1ews",
            '(h|bl)ouses$'           => "$1ouse",
            '(corpse)s$'             => "$1",
            '(us)es$'                => "$1",
            's$'                     => ""
        ];

        foreach ($singular as $rule => $replacement) {
            if (preg_match("/$rule$/i", $string)) {
                return preg_replace("/$rule$/i", $replacement, $string);
            }
        }

        return $string;
    }
}

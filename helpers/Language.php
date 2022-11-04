<?php
class Language { 
    private static string $fallback = 'en';

    public static function getLocale(): string {
        $locale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        return $locale;
    }

    public static function getFallback(): string {
        return self::$fallback;
    }
}
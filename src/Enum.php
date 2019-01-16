<?php

namespace IsnanIas\Enum;

use ReflectionClass;

abstract class Enum
{
    private static $constCacheArray = null;

    private static function getConstants()
    {
        if (self::$constCacheArray == null) {
            self::$constCacheArray = [];
        }

        $calledClass = get_called_class();

        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }

        return self::$constCacheArray[$calledClass];
    }

    public static function getKeys()
    {
        return array_keys(self::getConstants());
    }

    public static function getValues()
    {
        return array_values(self::getConstants());
    }

    public static function getKey(int $value)
    {
        return array_search($value, self::getConstants());
    }

    public static function getValue(string $key)
    {
        return self::getConstants()[$key];
    }

    public static function getDescription(int $value)
    {
        return self::getKey($value);
    }

    public static function getRandomKey()
    {
        $keys = self::getKeys();
        return $keys[array_rand($keys, 1)];
    }

    public static function getRandomValue()
    {
        $values = self::getValues();
        return $values[array_rand($values, 1)];
    }
}

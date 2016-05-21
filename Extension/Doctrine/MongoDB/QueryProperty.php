<?php

namespace FDevs\Pagination\Extension\Doctrine\MongoDB;

trait QueryProperty
{
    /**
     * @var \ReflectionProperty
     */
    private static $property;

    /**
     * @return \ReflectionProperty
     */
    public static function getProperty()
    {
        if (!self::$property) {
            $reflectionClass = new \ReflectionClass('Doctrine\MongoDB\Query\Query');
            self::$property = $reflectionClass->getProperty('query');
            self::$property->setAccessible(true);
        }

        return self::$property;
    }
}

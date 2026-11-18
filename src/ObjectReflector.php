<?php

declare(strict_types=1);

namespace webignition\ObjectReflector;

class ObjectReflector
{
    /**
     * @param class-string $objectClass
     * @param mixed        $propertyValue
     */
    public static function setProperty(
        object $object,
        string $objectClass,
        string $propertyName,
        $propertyValue
    ): void {
        try {
            $reflector = new \ReflectionClass($objectClass);
            $property = $reflector->getProperty($propertyName);
            $property->setValue($object, $propertyValue);
        } catch (\ReflectionException $exception) {
        }
    }

    /**
     * @param null|class-string|string $objectClass
     */
    public static function getProperty(object $object, string $propertyName, ?string $objectClass = null): mixed
    {
        $value = null;

        $objectClass = $objectClass ?? get_class($object);

        if (class_exists($objectClass)) {
            try {
                $reflector = new \ReflectionClass($objectClass);
                $property = $reflector->getProperty($propertyName);

                $value = $property->getValue($object);
            } catch (\ReflectionException $exception) {
            }
        }

        return $value;
    }
}

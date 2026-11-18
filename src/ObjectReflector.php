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
            $property->setAccessible(true);
            $property->setValue($object, $propertyValue);
        } catch (\ReflectionException $exception) {
        }
    }

    /**
     * @param null|class-string|string $objectClass
     *
     * @return mixed
     */
    public static function getProperty(object $object, string $propertyName, ?string $objectClass = null)
    {
        $value = null;

        $objectClass = $objectClass ?? get_class($object);

        if (class_exists($objectClass)) {
            try {
                $reflector = new \ReflectionClass($objectClass);
                $property = $reflector->getProperty($propertyName);
                $property->setAccessible(true);

                $value = $property->getValue($object);
            } catch (\ReflectionException $exception) {
            }
        }

        return $value;
    }
}

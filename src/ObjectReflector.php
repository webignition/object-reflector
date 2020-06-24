<?php

namespace webignition\ObjectReflector;

class ObjectReflector
{
    /**
     * @template T
     *
     * @param object $object
     * @param class-string<T> $objectClass
     * @param string $propertyName
     * @param mixed $propertyValue
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
     * @param object $object
     * @param string $propertyName
     * @param class-string<T>|string|null $objectClass
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

                $value =  $property->getValue($object);
            } catch (\ReflectionException $exception) {
            }
        }

        return $value;
    }
}

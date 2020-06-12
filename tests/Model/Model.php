<?php

declare(strict_types=1);

namespace webignition\ObjectReflector\Tests\Model;

class Model
{
    private string $property = '';

    public function getProperty(): string
    {
        return $this->property;
    }
}

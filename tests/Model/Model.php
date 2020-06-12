<?php

declare(strict_types=1);

namespace webignition\ObjectReflector\Tests\Model;

class Model
{
    private string $privatePropertyWithGetter = '';
    private string $privatePropertyWithoutGetter = 'no getter';

    public function getPrivatePropertyWithGetter(): string
    {
        return $this->privatePropertyWithGetter;
    }
}

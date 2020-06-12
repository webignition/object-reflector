<?php

declare(strict_types=1);

namespace webignition\ObjectReflector\Tests\Unit;

use webignition\ObjectReflector\ObjectReflector;
use webignition\ObjectReflector\Tests\Model\Model;

class ObjectReflectorTest extends \PHPUnit\Framework\TestCase
{
    public function testSetProperty()
    {
        $model = new Model();
        $this->assertSame('', $model->getProperty());

        ObjectReflector::setProperty($model, Model::class, 'property', 'content');

        $this->assertSame('content', $model->getProperty());
    }
}

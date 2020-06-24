<?php

declare(strict_types=1);

namespace webignition\ObjectReflector\Tests\Unit;

use webignition\ObjectReflector\ObjectReflector;
use webignition\ObjectReflector\Tests\Model\Model;
use webignition\ObjectReflector\Tests\Model\SpecificModel;

class ObjectReflectorTest extends \PHPUnit\Framework\TestCase
{
    public function testSetProperty()
    {
        $model = new Model();
        $this->assertSame('', $model->getPrivatePropertyWithGetter());

        ObjectReflector::setProperty($model, Model::class, 'privatePropertyWithGetter', 'content');

        $this->assertSame('content', $model->getPrivatePropertyWithGetter());
    }

    public function testGetProperty()
    {
        $model = new Model();
        $this->assertSame('no getter', ObjectReflector::getProperty($model, 'privatePropertyWithoutGetter'));
    }

    public function testGetPropertyForChildClassObjectAndParentClassProperty()
    {
        $specificModel = new SpecificModel();

        $this->assertNull(ObjectReflector::getProperty($specificModel, 'privatePropertyWithoutGetter'));

        $this->assertSame(
            'no getter',
            ObjectReflector::getProperty($specificModel, 'privatePropertyWithoutGetter', Model::class)
        );
    }
}

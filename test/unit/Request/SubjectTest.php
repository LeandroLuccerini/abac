<?php

declare(strict_types=1);

namespace Test\Szopen\Abac\unit\Request;

use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;
use Szopen\Abac\Request\Attribute;
use Szopen\Abac\Request\Subject;

class SubjectTest extends TestCase
{
    public function testInstantiationRaisesExceptionDueToNotAllInstancesOfAttribute(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Attributes must be all instance of Attribute");

        new Subject([new stdClass()]);
    }

    public function testInstantiationRaisesExceptionDueToEmptyArray(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Attributes must not be empty");

        new Subject([]);
    }

    public function testGetRaisesExceptionDueToAttributeIdNotFound(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Attribute notSet not found");

        $subject = new Subject([new Attribute("myAttribute", 2)]);

        $subject->getAttributeById("notSet");
    }

    public function testGetReturnsTheRightAttribute(): void
    {
        $attributeId = "myAttribute";
        $attributeValue = 2;

        $subject = new Subject([
            new Attribute($attributeId, $attributeValue),
            new Attribute("anotherAttribute", "anotherValue"),
        ]);


        $attribute = $subject->getAttributeById($attributeId);

        $this->assertEquals($attribute->attributeId, $attributeId);
        $this->assertEquals($attribute->value, $attributeValue);
    }
}
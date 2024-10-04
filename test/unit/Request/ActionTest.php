<?php

declare(strict_types=1);

namespace Test\Szopen\Abac\unit\Request;

use Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Szopen\Abac\Request\Action;

class ActionTest extends TestCase
{
    public static function emptyValuesProvider(): array
    {
        return [
            [''],
            [' '],
            ['  '],
        ];
    }

    public static function differentActionString(): array
    {
        return [
            ["My Action 1", "My Action2"],
            ["TestCase", "Testcase"],
            ["Test space", "Test  space"],
        ];
    }

    #[DataProvider("emptyValuesProvider")]
    public function testInstantiationRaisesExceptionDueToEmptyValue(string $value): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Action cannot be empty');

        new Action($value);
    }

    public function testEqualMustBeTrueForTwoIdenticalActionStrings(): void
    {
        $actionString1 = "My Action";
        $action1 = new Action($actionString1);

        $actionString2 = "My Action";
        $action2 = new Action($actionString2);

        $this->assertTrue($action1->equal($action2));
    }

    #[DataProvider("differentActionString")]
    public function testEqualMustBeFalseForTwoDifferentActionStrings(string $actionString1, string $actionString2): void
    {
        $action1 = new Action($actionString1);
        $action2 = new Action($actionString2);
        $this->assertFalse($action1->equal($action2));
    }
}
<?php

declare(strict_types=1);

namespace Test\Szopen\Abac\unit;

use Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Szopen\Abac\Action;

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

    #[DataProvider("emptyValuesProvider")]
    public function testInstantiationRaiseExceptionDueToEmptyValue(string $value): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Action cannot be empty');

        new Action($value);
    }
}
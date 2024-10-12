<?php

declare(strict_types=1);

namespace Test\Szopen\Abac\unit\Request;

use Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Szopen\Abac\Request\PolicyName;

class PolicyTest extends TestCase
{
    public static function emptyValuesProvider(): array
    {
        return [
            [''],
            [' '],
            ['  '],
        ];
    }

    public static function differentPolicyNameString(): array
    {
        return [
            ["My Policy 1", "My Policy2"],
            ["TestCase", "Testcase"],
            ["Test space", "Test  space"],
        ];
    }

    #[DataProvider("emptyValuesProvider")]
    public function testInstantiationRaisesExceptionDueToEmptyValue(string $value): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Policy name cannot be empty');

        new PolicyName($value);
    }

    public function testEqualMustBeTrueForTwoIdenticalPolicyNameStrings(): void
    {
        $policyNameString1 = "My Policy Name";
        $policyName1 = new PolicyName($policyNameString1);

        $policyNameString2 = "My Policy Name";
        $policyName2 = new PolicyName($policyNameString2);

        $this->assertTrue($policyName1->equal($policyName2));
    }

    #[DataProvider("differentPolicyNameString")]
    public function testEqualMustBeFalseForTwoDifferentPolicyNameStrings(
        string $policyNameString1,
        string $policyNameString2
    ): void {
        $policyName1 = new PolicyName($policyNameString1);
        $policyName2 = new PolicyName($policyNameString2);
        $this->assertFalse($policyName1->equal($policyName2));
    }
}
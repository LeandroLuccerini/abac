<?php

declare(strict_types=1);

namespace Test\Szopen\Abac\unit\Decision;

use PHPUnit\Framework\TestCase;
use Szopen\Abac\Decision\AllowIndeterminateDecisionPolicyEnforcementPoint;
use Szopen\Abac\Decision\Decision;
use Szopen\Abac\Decision\DenyIndeterminateDecisionPolicyEnforcementPoint;
use Szopen\Abac\Exception\AuthorizationFailedException;
use Szopen\Abac\Request\Action;
use Szopen\Abac\Request\Attribute;
use Szopen\Abac\Request\Resource;
use Szopen\Abac\Request\Subject;
use Test\Szopen\Abac\Stub\Decision\DesiredValuePolicyDecisionPointStub;

class AllowIndeterminateDecisionPolicyEnforcementPointTest extends TestCase
{
    public function testAuthorizeRaisesExceptionIfPdpDeniesRequest(): void
    {
        $pdp = new DesiredValuePolicyDecisionPointStub(Decision::DENY);
        $pep = new DenyIndeterminateDecisionPolicyEnforcementPoint($pdp);

        $this->expectException(AuthorizationFailedException::class);
        $this->expectExceptionMessage('Action "myAction" is not allowed');
        $pep->authorize(
            new Subject([
                new Attribute("myAttribute", "myValue")
            ]),
            new Action("myAction"),
            new Resource([
                new Attribute("myAttribute", "myValue")
            ])
        );
    }

    public function testAuthorizeAllowsActionIfPdpIndeterminatesRequest(): void
    {
        $pdp = new DesiredValuePolicyDecisionPointStub(Decision::INDETERMINATE);
        $pep = new AllowIndeterminateDecisionPolicyEnforcementPoint($pdp);

        $pep->authorize(
            new Subject([
                new Attribute("myAttribute", "myValue")
            ]),
            new Action("myAction"),
            new Resource([
                new Attribute("myAttribute", "myValue")
            ])
        );

        $this->assertTrue(true);
    }

    public function testAuthorizeAllowsActionIfPdpAllowsRequest(): void
    {
        $pdp = new DesiredValuePolicyDecisionPointStub(Decision::ALLOW);
        $pep = new AllowIndeterminateDecisionPolicyEnforcementPoint($pdp);

        $pep->authorize(
            new Subject([
                new Attribute("myAttribute", "myValue")
            ]),
            new Action("myAction"),
            new Resource([
                new Attribute("myAttribute", "myValue")
            ])
        );

        $this->assertTrue(true);
    }
}
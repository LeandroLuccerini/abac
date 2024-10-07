<?php

declare(strict_types=1);

namespace Test\Szopen\Abac\unit\Decision;

use PHPUnit\Framework\TestCase;
use Szopen\Abac\Decision\Effect;
use Szopen\Abac\Decision\DenyIndeterminateDecisionPolicyEnforcementPoint;
use Szopen\Abac\Exception\AuthorizationFailedException;
use Szopen\Abac\Request\Action;
use Szopen\Abac\Request\Attribute;
use Szopen\Abac\Request\Resource;
use Szopen\Abac\Request\Subject;
use Test\Szopen\Abac\Stub\Decision\DesiredValuePolicyDecisionPointStub;

class DenyIndeterminateDecisionPolicyEnforcementPointTest extends TestCase
{
    public function testAuthorizeRaisesExceptionIfPdpDeniesRequest(): void
    {
        $pdp = new DesiredValuePolicyDecisionPointStub(Effect::DENY);
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

    public function testAuthorizeRaisesExceptionIfPdpIndeterminatesRequest(): void
    {
        $pdp = new DesiredValuePolicyDecisionPointStub(Effect::INDETERMINATE);
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

    public function testAuthorizeAllowsActionIfPdpAllowsRequest(): void
    {
        $pdp = new DesiredValuePolicyDecisionPointStub(Effect::ALLOW);
        $pep = new DenyIndeterminateDecisionPolicyEnforcementPoint($pdp);

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
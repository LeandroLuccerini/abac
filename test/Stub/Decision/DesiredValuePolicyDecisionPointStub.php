<?php

declare(strict_types=1);

namespace Test\Szopen\Abac\Stub\Decision;

use Szopen\Abac\Decision\Effect;
use Szopen\Abac\Decision\PolicyDecisionPoint;
use Szopen\Abac\Decision\Request;

readonly class DesiredValuePolicyDecisionPointStub implements PolicyDecisionPoint
{
    public function __construct(private Effect $decision)
    {
    }

    public function evaluate(Request $request): Effect
    {
        return $this->decision;
    }
}
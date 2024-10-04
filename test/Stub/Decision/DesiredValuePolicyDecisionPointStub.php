<?php

declare(strict_types=1);

namespace Test\Szopen\Abac\Stub\Decision;

use Szopen\Abac\Decision\Decision;
use Szopen\Abac\Decision\PolicyDecisionPoint;
use Szopen\Abac\Decision\Request;

readonly class DesiredValuePolicyDecisionPointStub implements PolicyDecisionPoint
{
    public function __construct(private Decision $decision)
    {
    }

    public function evaluate(Request $request): Decision
    {
        return $this->decision;
    }
}
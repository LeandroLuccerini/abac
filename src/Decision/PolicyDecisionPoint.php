<?php

declare(strict_types=1);

namespace Szopen\Abac\Decision;

interface PolicyDecisionPoint
{
    public function evaluate(Request $request): Decision;
}
<?php

declare(strict_types=1);

namespace Szopen\Abac\Decision\Policy;

use Szopen\Abac\Request\PolicyName;

readonly class Policy
{
    public function __construct(
        private PolicyName $action,
        private RuleSet $ruleSet,
        private PermissionCheckerStrategy $permissionCheckerStrategy
    ) {
    }

    public function matchAction(PolicyName $action): bool
    {
        return $this->action->equal($action);
    }

    public function evaluate()
    {
        
    }
}
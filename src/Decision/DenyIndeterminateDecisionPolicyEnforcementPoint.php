<?php

declare(strict_types=1);

namespace Szopen\Abac\Decision;

use Szopen\Abac\Exception\AuthorizationFailedException;
use Szopen\Abac\Request\Action;
use Szopen\Abac\Request\Resource;
use Szopen\Abac\Request\Subject;

readonly class DenyIndeterminateDecisionPolicyEnforcementPoint implements PolicyEnforcementPoint
{
    public function __construct(private PolicyDecisionPoint $policyDecisionPoint)
    {
    }

    /** @throws AuthorizationFailedException */
    public function authorize(Subject $subject, Action $action, null|Resource $resource): void
    {
        $decision = $this->policyDecisionPoint->evaluate(
            new Request($subject, $action, $resource)
        );

        if ($decision === Effect::DENY || $decision === Effect::INDETERMINATE) {
            throw AuthorizationFailedException::actionNotAllowed($action);
        }
    }
}
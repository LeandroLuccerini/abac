<?php

declare(strict_types=1);

namespace Szopen\Abac\Decision;

use Szopen\Abac\Exception\AuthorizationFailedException;
use Szopen\Abac\Request\Action;
use Szopen\Abac\Request\Resource;
use Szopen\Abac\Request\Subject;

interface PolicyEnforcementPoint
{
    /** @throws AuthorizationFailedException */
    public function authorize(Subject $subject, Action $action, null|Resource $resource): void;
}
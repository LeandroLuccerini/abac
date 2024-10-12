<?php

declare(strict_types=1);

namespace Szopen\Abac\Decision;

use Szopen\Abac\Request\PolicyName;
use Szopen\Abac\Request\Resource;
use Szopen\Abac\Request\Subject;

readonly class Request
{
    public function __construct(public Subject $subject, public PolicyName $action, public null|Resource $resource)
    {
    }
}
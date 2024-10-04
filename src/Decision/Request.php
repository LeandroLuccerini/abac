<?php

declare(strict_types=1);

namespace Szopen\Abac\Decision;

use Szopen\Abac\Request\Action;
use Szopen\Abac\Request\Resource;
use Szopen\Abac\Request\Subject;

readonly class Request
{
    public function __construct(public Subject $subject, public Action $action, public null|Resource $resource)
    {
    }
}
<?php

declare(strict_types=1);

namespace Szopen\Abac\Decision\Policy;

use Szopen\Abac\Decision\Effect;
use Szopen\Abac\Decision\Request;
use Szopen\Abac\Request\Action;

readonly class Rule
{
    public function __construct(private Action $action)
    {
    }


    public function apply(Request $request): Effect
    {
        if (!$this->action->equal($request->action)) {
            return Effect::INDETERMINATE;
        }

        return Effect::INDETERMINATE;
    }
}
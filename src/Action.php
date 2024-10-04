<?php

declare(strict_types=1);

namespace Szopen\Abac;

use InvalidArgumentException;

readonly class Action
{
    public function __construct(private string $action)
    {
        if (empty(trim($this->action))) {
            throw new InvalidArgumentException('Action cannot be empty');
        }
    }

    public function equal(Action $action): bool
    {
        return $this->action === $action->action;
    }
}
<?php

declare(strict_types=1);

namespace Szopen\Abac\Request;

use InvalidArgumentException;

readonly class PolicyName
{
    public function __construct(private string $action)
    {
        if (empty(trim($this->action))) {
            throw new InvalidArgumentException('Policy name cannot be empty');
        }
    }

    public function equal(PolicyName $action): bool
    {
        return $this->action === $action->action;
    }

    public function asString(): string
    {
        return $this->action;
    }
}
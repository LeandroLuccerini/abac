<?php

declare(strict_types=1);

namespace Szopen\Abac\Request;

readonly class Attribute
{
    /**
     * @param string|int|array<int, mixed>|float|bool|null $value
     */
    public function __construct(public string $attributeId, public string|int|array|float|bool|null $value)
    {
    }
}
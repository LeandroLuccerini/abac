<?php

declare(strict_types=1);

namespace Szopen\Abac\Decision;

enum Decision
{
    case ALLOW;
    case DENY;
    case INDETERMINATE;
}

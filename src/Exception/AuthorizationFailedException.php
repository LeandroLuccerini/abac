<?php

declare(strict_types=1);

namespace Szopen\Abac\Exception;

use Exception;
use Szopen\Abac\Request\PolicyName;

class AuthorizationFailedException extends Exception
{
    public static function actionNotAllowed(PolicyName $action): self
    {
        $e = new self;

        $e->message = sprintf(
            'Policy "%s" is not allowed',
            $action->asString()
        );

        return $e;
    }
}
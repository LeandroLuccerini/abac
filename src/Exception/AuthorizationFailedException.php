<?php

declare(strict_types=1);

namespace Szopen\Abac\Exception;

use Exception;
use Szopen\Abac\Request\Action;

class AuthorizationFailedException extends Exception
{
    public static function actionNotAllowed(Action $action): self
    {
        $e = new self;

        $e->message = sprintf(
            'Action "%s" is not allowed',
            $action->asString()
        );

        return $e;
    }
}
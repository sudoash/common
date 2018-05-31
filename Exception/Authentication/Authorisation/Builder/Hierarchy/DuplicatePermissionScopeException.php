<?php

declare(strict_types=1);

namespace Umber\Common\Exception\Authentication\Authorisation\Builder\Hierarchy;

use Umber\Common\Exception\AbstractRuntimeException;

/**
 * {@inheritdoc}
 */
final class DuplicatePermissionScopeException extends AbstractRuntimeException
{
    /**
     * @return DuplicateRoleException
     */
    public static function create(string $scope): self
    {
        return new self([
            'scope' => $scope,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getMessageTemplate(): array
    {
        return [
            'The hierarchy cannot contain duplicate permission scopes.',
            'The permission scope "{{scope}}" has already been defined and cannot be overwritten or merged.',
        ];
    }
}

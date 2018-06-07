<?php

declare(strict_types=1);

namespace Umber\Common\Authentication\Authorisation\Credential;

use Umber\Common\Authentication\Authorisation\AuthorisationInterface;
use Umber\Common\Authentication\Prototype\UserInterface;
use Umber\Common\Authentication\Resolver\Credential\CredentialInterface;

/**
 * An implementation of authorisation interface aware of credentials.
 */
interface CredentialAwareAuthorisationInterface extends AuthorisationInterface
{
    /**
     * Return the credentials.
     */
    public function getCredentials(): CredentialInterface;

    /**
     * Return the user.
     */
    public function getUser(): UserInterface;
}
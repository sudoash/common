<?php

declare(strict_types=1);

namespace Umber\Common\Factory\Date;

use DateTimeImmutable;

/**
 * A date time factory.
 */
interface DateTimeFactoryInterface
{
    /**
     * Create an immutable date time for "now".
     */
    public function create(): DateTimeImmutable;
}

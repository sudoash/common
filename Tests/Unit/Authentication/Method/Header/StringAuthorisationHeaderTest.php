<?php

declare(strict_types=1);

namespace Umber\Common\Tests\Unit\Authentication\Method\Header;

use Umber\Common\Authentication\Method\Header\StringAuthorisationHeader;

use PHPUnit\Framework\TestCase;

/**
 * {@inheritdoc}
 */
final class StringAuthorisationHeaderTest extends TestCase
{
    /**
     * @test
     *
     * @group unit
     * @group authentication
     *
     * @covers \Umber\Common\Authentication\Method\Header\StringAuthorisationHeader
     */
    public function canConstructBasic(): void
    {
        $header = new StringAuthorisationHeader('some-type some-value');

        self::assertEquals('some-type', $header->getType());
        self::assertEquals('some-value', $header->getCredentials());
    }

    /**
     * @test
     *
     * @group unit
     * @group authentication
     *
     * @covers \Umber\Common\Authentication\Method\Header\StringAuthorisationHeader
     */
    public function canHandleTypeCase(): void
    {
        $header = new StringAuthorisationHeader('BEARer SomeValueHERE');

        self::assertEquals('bearer', $header->getType());
        self::assertEquals('SomeValueHERE', $header->getCredentials());
    }

    /**
     * @test
     *
     * @group unit
     * @group authentication
     *
     * @covers \Umber\Common\Authentication\Method\Header\StringAuthorisationHeader
     */
    public function canCastString(): void
    {
        $header = new StringAuthorisationHeader('bearer some-value');

        $expected = 'Bearer some-value';

        self::assertEquals($expected, (string) $header);
    }
}

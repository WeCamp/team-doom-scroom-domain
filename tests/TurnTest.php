<?php

declare(strict_types=1);

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Turn;

final class TurnTest extends TestCase
{
    /**
     * @test
     */
    public function itStarts(): void
    {
        $turn = Turn::start();

        $this->assertInstanceOf(Turn::class, $turn);
    }

    /**
     * @test
     */
    public function itHasNotImmediatelyEnded()
    {
        $turn = Turn::start();

        $this->assertFalse($turn->hasEnded());
    }

    /**
     * @test
     */
    public function itEnds()
    {
        $turn = Turn::start();
        $turn->end();

        $this->assertTrue($turn->hasEnded());
    }
}

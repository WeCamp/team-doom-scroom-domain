<?php

declare(strict_types=1);

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Play;
use Scroom\Turn;

final class PlayTest extends TestCase
{
    /**
     * @test
     */
    public function itStarts(): void
    {
        $play = Play::start();

        $this->assertInstanceOf(Play::class, $play);
    }

    /**
     * @test
     */
    public function itHasAnId(): void
    {
        $play = Play::start();

        $this->assertNotEmpty($play->id());
    }

    /**
     * @test
     */
    public function itImmediatelyStartsTheFirstTurn(): void
    {
        $play = Play::start();

        $this->assertInstanceOf(Turn::class, $play->currentTurn());
    }

    /**
     * @test
     */
    public function itHasNotImmediatelyEnded(): void
    {
        $play = Play::start();

        $this->assertFalse($play->hasEnded());
    }

    /**
     * @test
     */
    public function itEnds(): void
    {
        $play = Play::start();
        $play->end();

        $this->assertTrue($play->hasEnded());
    }

    /**
     * @test
     */
    public function itsCurrentTurnEndsWhenItselfEnds(): void
    {
        $play = Play::start();
        $play->end();

        $this->assertTrue($play->currentTurn()->hasEnded());
    }

    /**
     * @test
     */
    public function itEndsTheCurrentTurn(): void
    {
        $play = Play::start();
        $firstTurn = $play->currentTurn();

        $play->endTurn();

        $this->assertTrue($firstTurn->hasEnded());
    }

    /**
     * @test
     */
    public function aNewTurnStartsWhenTheCurrentOneEnds(): void
    {
        $play = Play::start();
        $firstTurn = $play->currentTurn();

        $play->endTurn();

        $this->assertNotEquals($firstTurn, $play->currentTurn());
    }
}

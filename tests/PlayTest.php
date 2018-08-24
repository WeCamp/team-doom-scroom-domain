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
    public function itImmediatelyStartsTheFirstTurn()
    {
        $play = Play::start();

        $this->assertInstanceOf(Turn::class, $play->currentTurn());
    }

    /**
     * @test
     */
    public function itHasNotImmediatelyEnded()
    {
        $play = Play::start();

        $this->assertFalse($play->hasEnded());
    }

    /**
     * @test
     */
    public function itEnds()
    {
        $play = Play::start();
        $play->end();

        $this->assertTrue($play->hasEnded());
    }

    /**
     * @test
     */
    public function itsCurrentTurnEndsWhenItselfEnds()
    {
        $play = Play::start();
        $play->end();

        $this->assertTrue($play->currentTurn()->hasEnded());
    }

    /**
     * @test
     */
    public function itEndsTheCurrentTurn()
    {
        $play = Play::start();
        $firstTurn = $play->currentTurn();

        $play->endTurn();

        $this->assertTrue($firstTurn->hasEnded());
    }

    /**
     * @test
     */
    public function aNewTurnStartsWhenTheCurrentOneEnds()
    {
        $play = Play::start();
        $firstTurn = $play->currentTurn();

        $play->endTurn();

        $this->assertNotEquals($firstTurn, $play->currentTurn());
    }
}

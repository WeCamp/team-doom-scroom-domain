<?php

declare(strict_types=1);

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Card;
use Scroom\Loon;
use Scroom\Play;
use Scroom\Room;

final class RoomTest extends TestCase
{
    /**
     * @test
     */
    public function itOpensUpWithAName(): void
    {
        $room = Room::openUp('Some name');

        $this->assertInstanceOf(Room::class, $room);
        $this->assertEquals('Some name', $room->name());
    }

    /**
     * @test
     */
    public function itHasAnId(): void
    {
        $room = Room::openUp('Test room');

        $this->assertNotEmpty($room->id());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function itsNameCannotBeEmpty(): void
    {
        Room::openUp(' ');
    }

    /**
     * @test
     */
    public function itStartsAPlayImmediately(): void
    {
        $room = Room::openUp('Some name');

        $this->assertInstanceOf(Play::class, $room->currentPlay());
    }

    /**
     * @test
     */
    public function itChecksIfAllPicksAreIn(): void
    {
        $room = Room::openUp('Some name');
        $loon1 = Loon::enter($room);
        $loon2 = Loon::enter($room);

        $this->assertFalse($room->allPicksAreIn());

        $loon1->pick(Card::ONE());
        $this->assertFalse($room->allPicksAreIn());

        $loon2->pick(Card::ONE());
        $this->assertTrue($room->allPicksAreIn());
    }

    /**
     * @test
     */
    public function itEndsTheCurrentTurnWhenAllPicksAreIn(): void
    {
        $room = Room::openUp('Some name');
        $loon1 = Loon::enter($room);
        $loon2 = Loon::enter($room);
        $currentTurn = $room->currentPlay()->currentTurn();

        $loon1->pick(Card::ONE());
        $this->assertFalse($currentTurn->hasEnded());

        $loon2->pick(Card::ONE());
        $this->assertTrue($currentTurn->hasEnded());
    }
}

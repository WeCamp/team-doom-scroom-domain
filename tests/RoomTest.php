<?php

declare(strict_types=1);

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
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
     * @expectedException \InvalidArgumentException
     */
    public function itsNameCannotBeEmpty(): void
    {
        Room::openUp(' ');
    }

    /**
     * @test
     */
    public function itStartsAPlay(): void
    {
        $room = Room::openUp('Some name');
        $room->startPlay();

        $this->assertInstanceOf(Play::class, $room->currentPlay());
    }
}

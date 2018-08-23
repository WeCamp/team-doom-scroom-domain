<?php

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Play;
use Scroom\Room;

final class RoomTest extends TestCase
{
    /**
     * @test
     */
    public function itOpensUpWithAName()
    {
        $room = Room::openUp('Some name');

        $this->assertInstanceOf(Room::class, $room);
        $this->assertEquals('Some name', $room->name());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function itsNameCannotBeEmpty()
    {
        Room::openUp(' ');
    }

    /**
     * @test
     */
    public function itStartsAPlay()
    {
        $room = Room::openUp('Some name');
        $room->startPlay();

        $this->assertInstanceOf(Play::class, $room->currentPlay());
    }
}

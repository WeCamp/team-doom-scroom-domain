<?php

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
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
}

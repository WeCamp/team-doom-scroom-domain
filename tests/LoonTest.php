<?php

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Loon;
use Scroom\Room;

final class LoonTest extends TestCase
{
    /**
     * @var Room;
     */
    private $room;

    protected function setUp(): void
    {
        $this->room = Room::openUp('Some name');
    }

    protected function tearDown(): void
    {
        $this->room = null;
    }

    /**
     * @test
     */
    public function itEntersARoom(): void
    {
        $loon = Loon::enter($this->room);

        $this->assertInstanceOf(Loon::class, $loon);
        $this->assertTrue($this->room->hasReceived($loon));
    }

    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function itOnlyEntersTheRoomOnce(): void
    {
        $loon = Loon::enter($this->room);

        $this->room->receiveLoon($loon);
    }
}

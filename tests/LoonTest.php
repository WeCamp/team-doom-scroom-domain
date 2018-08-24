<?php

declare(strict_types=1);

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Card;
use Scroom\Loon;
use Scroom\Room;

final class LoonTest extends TestCase
{
    /**
     * @var Room
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
        $this->assertEquals($this->room, $loon->room());
        $this->assertTrue($this->room->hasReceived($loon));
    }

    /**
     * @test
     */
    public function itHasAnId(): void
    {
        $loon = Loon::enter($this->room);

        $this->assertNotEmpty($loon->id());
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

    /**
     * @test
     */
    public function itHasNotPickedACardImmediately(): void
    {
        $loon = Loon::enter($this->room);

        $this->assertNull($loon->pickedCard());
    }

    /**
     * @test
     */
    public function itPicksACard(): void
    {
        $loon = Loon::enter($this->room);

        $loon->pick(Card::ONE());

        $this->assertEquals(Card::ONE(), $loon->pickedCard());
    }
}

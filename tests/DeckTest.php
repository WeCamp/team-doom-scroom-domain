<?php

declare(strict_types=1);

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Card;
use Scroom\Deck;

final class DeckTest extends TestCase
{
    /**
     * @test
     */
    public function itForms(): void
    {
        $deck = Deck::form([Card::ONE()]);

        $this->assertInstanceOf(Deck::class, $deck);
        $this->assertEquals([Card::ONE()], $deck->cards());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function itCannotFormWithNoCards(): void
    {
        Deck::form([]);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function itCanOnlyContainCards(): void
    {
        Deck::form(['not a card']);
    }

    /**
     * @test
     */
    public function itCanFormACompleteSet(): void
    {
        $deck = Deck::formCompleteSet();

        $this->assertInstanceOf(Deck::class, $deck);
        $this->assertEquals(Card::all(), $deck->cards());
    }
}

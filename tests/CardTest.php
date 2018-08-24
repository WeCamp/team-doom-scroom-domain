<?php

declare(strict_types=1);

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Card;

final class CardTest extends TestCase
{
    /**
     * @test
     */
    public function itRepresentsAPlanningPokerCard(): void
    {
        $this->assertEquals('1', Card::ONE()->toString());
        $this->assertEquals('2', Card::TWO()->toString());
        $this->assertEquals('3', Card::THREE()->toString());
        $this->assertEquals('5', Card::FIVE()->toString());
        $this->assertEquals('8', Card::EIGHT()->toString());
        $this->assertEquals('13', Card::THIRTEEN()->toString());
        $this->assertEquals('20', Card::TWENTY()->toString());
        $this->assertEquals('40', Card::FORTY()->toString());
        $this->assertEquals('100', Card::HUNDRED()->toString());
        $this->assertEquals('?', Card::UNKNOWN()->toString());
        $this->assertEquals('infinite', Card::INFINITE()->toString());
        $this->assertEquals('coffee', Card::COFFEE()->toString());
    }

    /**
     * @test
     */
    public function itRevealsAllAvailableCards(): void
    {
        $allCards = Card::all();

        $this->assertContains(Card::ONE(), $allCards, '', false, false);
        $this->assertContains(Card::TWO(), $allCards, '', false, false);
        $this->assertContains(Card::THREE(), $allCards, '', false, false);
        $this->assertContains(Card::FIVE(), $allCards, '', false, false);
        $this->assertContains(Card::EIGHT(), $allCards, '', false, false);
        $this->assertContains(Card::THIRTEEN(), $allCards, '', false, false);
        $this->assertContains(Card::TWENTY(), $allCards, '', false, false);
        $this->assertContains(Card::FORTY(), $allCards, '', false, false);
        $this->assertContains(Card::HUNDRED(), $allCards, '', false, false);
        $this->assertContains(Card::UNKNOWN(), $allCards, '', false, false);
        $this->assertContains(Card::INFINITE(), $allCards, '', false, false);
        $this->assertContains(Card::COFFEE(), $allCards, '', false, false);
    }
}

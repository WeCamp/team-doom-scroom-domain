<?php

declare(strict_types=1);

namespace Scroom;

use InvalidArgumentException;

final class Deck
{
    /**
     * @var Card[]
     */
    private $cards;

    /**
     * @param Card[] $cards
     * @return Deck
     */
    public static function form(array $cards): self
    {
        return new self($cards);
    }

    public static function formCompleteSet(): self
    {
        return new self(Card::all());
    }

    /**
     * @return Card[]
     */
    public function cards(): array
    {
        return $this->cards;
    }

    private function __construct(array $cards)
    {
        if (!$cards) {
            throw new InvalidArgumentException('Cannot form an empty deck');
        }

        foreach ($cards as $card) {
            if (!$card instanceof Card) {
                throw new InvalidArgumentException('Only cards can form a deck');
            }
        }

        $this->cards = $cards;
    }
}

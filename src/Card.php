<?php

declare(strict_types=1);

namespace Scroom;

use InvalidArgumentException;

final class Card
{
    private const ONE = '1';
    private const TWO = '2';
    private const THREE = '3';
    private const FIVE = '5';
    private const EIGHT = '8';
    private const THIRTEEN = '13';
    private const TWENTY = '20';
    private const FORTY = '40';
    private const HUNDRED = '100';
    private const UNKNOWN = '?';
    private const INFINITE = 'infinite';
    private const COFFEE = 'coffee';

    /**
     * @var string
     */
    private $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ONE(): self
    {
        return new self(self::ONE);
    }

    public static function TWO(): self
    {
        return new self(self::TWO);
    }

    public static function THREE(): self
    {
        return new self(self::THREE);
    }

    public static function FIVE(): self
    {
        return new self(self::FIVE);
    }

    public static function EIGHT(): self
    {
        return new self(self::EIGHT);
    }

    public static function THIRTEEN(): self
    {
        return new self(self::THIRTEEN);
    }

    public static function TWENTY(): self
    {
        return new self(self::TWENTY);
    }

    public static function FORTY(): self
    {
        return new self(self::FORTY);
    }

    public static function HUNDRED(): self
    {
        return new self(self::HUNDRED);
    }

    public static function UNKNOWN(): self
    {
        return new self(self::UNKNOWN);
    }

    public static function INFINITE(): self
    {
        return new self(self::INFINITE);
    }

    public static function COFFEE(): self
    {
        return new self(self::COFFEE);
    }

    /**
     * @param string $value
     *
     * @return Card
     */
    public static function new(string $value): Card
    {
        $all = [
            self::ONE,
            self::TWO,
            self::THREE,
            self::FIVE,
            self::EIGHT,
            self::THIRTEEN,
            self::TWENTY,
            self::FORTY,
            self::HUNDRED,
            self::UNKNOWN,
            self::INFINITE,
            self::COFFEE,
        ];

        if (!in_array($value, $all)) {
            throw new InvalidArgumentException('Not a valid card value.');
        }

        return new self($value);
    }

    /**
     * @return Card[]
     */
    public static function all(): array
    {
        return [
            Card::ONE(),
            Card::TWO(),
            Card::THREE(),
            Card::FIVE(),
            Card::EIGHT(),
            Card::THIRTEEN(),
            Card::TWENTY(),
            Card::FORTY(),
            Card::HUNDRED(),
            Card::UNKNOWN(),
            Card::INFINITE(),
            Card::COFFEE(),
        ];
    }

    public function toString(): string
    {
        return $this->value;
    }
}

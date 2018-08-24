<?php

declare(strict_types=1);

namespace Scroom;

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

    public function toString()
    {
        return $this->value;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }
}

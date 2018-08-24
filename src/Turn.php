<?php

declare(strict_types=1);

namespace Scroom;

final class Turn
{
    /**
     * @var bool
     */
    private $hasEnded;

    public static function start(): self
    {
        return new self();
    }

    public function end(): void
    {
        $this->hasEnded = true;
    }

    public function hasEnded(): bool
    {
        return $this->hasEnded;
    }

    private function __construct()
    {
        $this->hasEnded = false;
    }
}

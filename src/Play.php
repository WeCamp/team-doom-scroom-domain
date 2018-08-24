<?php

declare(strict_types=1);

namespace Scroom;

final class Play
{
    /**
     * @var Turn[]
     */
    private $turns;

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
        $this->currentTurn()->end();
        $this->hasEnded = true;
    }

    public function endTurn(): void
    {
        $this->currentTurn()->end();
        $this->turns[] = Turn::start();
    }

    public function currentTurn(): Turn
    {
        return end($this->turns);
    }

    public function hasEnded(): bool
    {
        return $this->hasEnded;
    }

    private function __construct()
    {
        $this->turns = [Turn::start()];
        $this->hasEnded = false;
    }
}

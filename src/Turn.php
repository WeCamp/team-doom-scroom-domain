<?php

declare(strict_types=1);

namespace Scroom;

use Ramsey\Uuid\Uuid;

final class Turn
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var bool
     */
    private $hasEnded;

    public static function start(): self
    {
        return new self();
    }

    public function id(): string
    {
        return $this->id;
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
        $this->id = Uuid::uuid4()->toString();
        $this->hasEnded = false;
    }
}

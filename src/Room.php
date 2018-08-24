<?php

declare(strict_types=1);

namespace Scroom;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid;
use RuntimeException;

final class Room
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Loon[]
     */
    private $loons;

    /**
     * @var Play
     */
    private $play;

    public static function openUp(string $name): self
    {
        return new self($name);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function loons(): array
    {
        return $this->loons;
    }

    public function receiveLoon(Loon $loon): void
    {
        foreach ($this->loons as $loonInRoom) {
            if ($loon->id() === $loonInRoom->id()) {
                throw new RuntimeException('Loon can only enter the room once');
            }
        }

        $this->loons[] = $loon;
    }

    public function hasReceived(Loon $loon): bool
    {
        foreach ($this->loons as $loonInRoom) {
            if ($loon->id() === $loonInRoom->id()) {
                return true;
            }
        }

        return false;
    }

    public function currentPlay(): Play
    {
        return $this->play;
    }

    public function allPicksAreIn(): bool
    {
        foreach ($this->loons as $loon) {
            if ($loon->pickedCard() === null) {
                return false;
            }
        }

        return true;
    }

    private function __construct(string $name)
    {
        if (!trim($name)) {
            throw new InvalidArgumentException('Room-name cannot be empty');
        }

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->id = Uuid::uuid4()->toString();

        $this->name = $name;
        $this->loons = [];
        $this->play = Play::start();
    }
}

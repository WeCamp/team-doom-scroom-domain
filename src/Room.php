<?php

namespace Scroom;

use Ramsey\Uuid\Uuid;

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

    public function receiveLoon(Loon $loon): void
    {
        foreach ($this->loons as $loonInRoom) {
            if ($loon->id() === $loonInRoom->id()) {
                throw new \RuntimeException('Loon can only enter the room once');
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

    public function startPlay(): void
    {
        $this->play = Play::start();
    }

    public function currentPlay(): Play
    {
        return $this->play;
    }

    private function __construct(string $name)
    {
        $this->id = Uuid::uuid4()->toString();

        if (!trim($name)) {
            throw new \InvalidArgumentException('Room-name cannot be empty');
        }

        $this->name = $name;
        $this->loons = [];
    }
}

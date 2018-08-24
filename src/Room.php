<?php

namespace Scroom;

final class Room
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Loon[]
     */
    private $loons;

    public static function openUp(string $name): self
    {
        return new self($name);
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

    private function __construct(string $name)
    {
        if (!trim($name)) {
            throw new \InvalidArgumentException('Room-name cannot be empty');
        }

        $this->name = $name;
        $this->loons = [];
    }
}

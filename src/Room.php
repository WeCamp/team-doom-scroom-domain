<?php

namespace Scroom;

final class Room
{
    /**
     * @var string
     */
    private $name;

    public static function openUp(string $name): self
    {
        if (!trim($name)) {
            throw new \InvalidArgumentException('Room-name cannot be empty');
        }

        $room = new self();
        $room->name = $name;

        return $room;
    }

    public function name(): string
    {
        return $this->name;
    }
}

<?php

namespace Scroom;

use Ramsey\Uuid\Uuid;

final class Loon
{
    /**
     * @var string
     */
    private $id;

    public static function enter(Room $room): self
    {
        return new self($room);
    }

    public function id(): string
    {
        return $this->id;
    }

    private function __construct(Room $room)
    {
        $this->id = Uuid::uuid4()->toString();

        $room->receiveLoon($this);
    }
}

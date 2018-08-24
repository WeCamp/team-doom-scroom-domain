<?php

declare(strict_types=1);

namespace Scroom;

use Ramsey\Uuid\Uuid;

final class Loon
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var Room
     */
    private $room;

    /**
     * @var Card|null
     */
    private $pickedCard;

    public static function enter(Room $room): self
    {
        return new self($room);
    }

    public function pick(Card $card): void
    {
        $this->pickedCard = $card;

        if ($this->room->allPicksAreIn()) {
            $this->room->currentPlay()->endTurn();
        }
    }

    public function id(): string
    {
        return $this->id;
    }

    public function room(): Room
    {
        return $this->room;
    }

    public function pickedCard(): ?Card
    {
        return $this->pickedCard;
    }

    private function __construct(Room $room)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->id = Uuid::uuid4()->toString();

        $this->room = $room;

        $room->receiveLoon($this);
    }
}

<?php

namespace Scroom;

final class Play
{
    public static function start(): self
    {
        return new self();
    }

    private function __construct()
    {
    }
}

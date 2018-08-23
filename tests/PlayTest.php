<?php

namespace Scroom\Tests;

use PHPUnit\Framework\TestCase;
use Scroom\Play;

final class PlayTest extends TestCase
{
    /**
     * @test
     */
    public function itStarts(): void
    {
        $play = Play::start();

        $this->assertInstanceOf(Play::class, $play);
    }
}

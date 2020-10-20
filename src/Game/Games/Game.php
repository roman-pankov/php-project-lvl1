<?php

namespace Brain\Games\Game\Games;

use Brain\Games\Game\GameInterface;

class Game implements GameInterface
{
    public function start(): void
    {

    }

    public function question(): bool
    {
        return true;
    }
}

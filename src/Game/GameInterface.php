<?php

namespace Brain\Games\Game;

interface GameInterface
{
    public function start(): void;

    public function question(): bool;
}

<?php

namespace Brain\Games;

use Brain\Games\Game\GameInterface;

use function cli\line;
use function cli\prompt;

class Main
{
    public function start(string $gameName): void
    {
        /**
         * @uses \Brain\Games\Game\Even\Game
         */
        $class = "\\Brain\\Games\\Game\\{$gameName}\\Game";

        /*
         * Допустим мы передали INPUT и OUTPUT в new $class,
         * чтобы не была привязка только к консоли
         */
        /** @var GameInterface $game */
        $game = new $class();

        $this->welcome();

        $username = $this->askUsername();

        $game->start($username);
    }

    protected function welcome(): void
    {
        line('Welcome to the Brain Games!');
    }

    protected function askUsername(): string
    {
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);

        return $name;
    }
}

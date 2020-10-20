<?php

namespace Brain\Games;

use Brain\Games\Game\GameInterface;

use function cli\err;
use function cli\line;
use function cli\prompt;

class Main
{
    protected const ATTEMPT_SUCCESS = 3;

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

        line('Welcome to the Brain Games!');
        $username = prompt('May I have your name?');
        line("Hello, %s!", $username);

        $game->start();

        for ($attempt = 0; $attempt < self::ATTEMPT_SUCCESS; $attempt++) {
            if (false === $game->question()) {
                err("Let's try again, %s", $username);

                return;
            }
        }

        line('Congratulations, %s!', $username);
    }
}

<?php

namespace Brain\Games\Game\Even;

use Brain\Games\Game\GameInterface;

use function cli\err;
use function cli\line;
use function cli\prompt;

class Game implements GameInterface
{
    protected const VARIANT_ANSWERS = [
        1 => 'no',
        0 => 'yes',
    ];

    public function start(): void
    {
        line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    }

    public function question(): bool
    {
        $num = rand(1, 100);

        line("Question: %s", $num);
        $answer = prompt('Your answer');

        $key = ($num % 2);

        if (self::VARIANT_ANSWERS[$key] !== $answer) {
            err("'yes' is wrong answer ;(. Correct answer was 'no'.");

            return false;
        }

        return true;
    }
}

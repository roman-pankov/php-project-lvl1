<?php

namespace Brain\Games\Game\Even;

use Brain\Games\Game\GameInterface;

use function cli\err;
use function cli\line;
use function cli\prompt;

class Game implements GameInterface
{
    protected const ATTEMPT_SUCCESS = 3;
    protected const VARIANT_ANSWERS = [
        1 => 'no',
        0 => 'yes',
    ];

    public function start(string $username): int
    {
        line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

        for ($attempt = 0; $attempt < self::ATTEMPT_SUCCESS; $attempt++) {
            $num = rand(1, 100);

            line("Question: %s", $num);
            $answer = prompt('Your answer');

            $key = ($num % 2);

            if (self::VARIANT_ANSWERS[$key] !== $answer) {
                err("'yes' is wrong answer ;(. Correct answer was 'no'.");
                err("Let's try again, %s", $username);

                return 1;
            }

            line('Correct!');
        }

        line('Congratulations, %s!', $username);

        return 0;
    }
}

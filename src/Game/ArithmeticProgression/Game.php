<?php

namespace Brain\Games\Game\ArithmeticProgression;

use Brain\Games\Game\GameInterface;

use function cli\err;
use function cli\line;
use function cli\prompt;

class Game implements GameInterface
{

    public function start(): void
    {
        line('What number is missing in the progression?');
    }

    public function question(): bool
    {
        $d = rand(2, 3);

        $start = rand(1, 100);

        $len = rand(10, 20);

        $progression = [];

        for ($i = 0; $i < $len; $i++) {
            $progression[] = $start + ($d * $i);
        }

        $key = array_rand($progression);

        $result = $progression[$key];

        $progression[$key] = '..';

        line("Question: %s", implode(' ', $progression));

        $answer = prompt('Your answer');

        if ((int)$result !== (int)$answer) {
            err("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");

            return false;
        }

        return true;
    }
}

<?php

namespace Brain\Games\Game\Gcm;

use Brain\Games\Game\GameInterface;

use function cli\err;
use function cli\line;
use function cli\prompt;

class Game implements GameInterface
{
    public function start(): void
    {
        line("Find the greatest common divisor of given numbers.");
    }

    public function question(): bool
    {
        $num1 = rand(1, 99);
        $num2 = rand(1, 99);

        line("Question: %s %s", $num1, $num2);

        $answer = prompt('Your answer');

        $result = $this->gcd($num1, $num2);

        if ((int)$answer !== $result) {
            err("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");

            return false;
        }

        return true;
    }

    protected function gcd($n, $m): int
    {
        return $m ? $this->gcd($m, $n % $m) : $n;
    }
}

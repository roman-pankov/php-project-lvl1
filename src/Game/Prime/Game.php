<?php

namespace Brain\Games\Game\Prime;

use Brain\Games\Game\GameInterface;

use function cli\err;
use function cli\line;
use function cli\prompt;

class Game implements GameInterface
{
    protected const VARIANT_ANSWERS = [
        false => 'no',
        true => 'yes',
    ];

    public function start(): void
    {
        line('Answer "yes" if given number is prime. Otherwise answer "no".');
    }

    public function question(): bool
    {
        $num = rand(2, 100);

        line("Question: %s", $num);

        $answer = prompt('Your answer');

        if (self::VARIANT_ANSWERS[$this->isPrime($num)] !== $answer) {
            err("'yes' is wrong answer ;(. Correct answer was 'no'.");

            return false;
        }

        return true;
    }

    protected function isPrime(int $num): bool
    {
        for ($i = 2; $i < $num; $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }
}

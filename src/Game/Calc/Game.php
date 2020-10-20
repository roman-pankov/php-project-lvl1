<?php

namespace Brain\Games\Game\Calc;

use Brain\Games\Game\GameInterface;

use function cli\err;
use function cli\line;
use function cli\prompt;

class Game implements GameInterface
{
    protected const OPERATIONS = [
        '+',
        '-',
        '*',
    ];

    public function start(): void
    {
        line("What is the result of the expression?");
    }

    public function question(): bool
    {
        $num1      = rand(1, 9);
        $num2      = rand(1, 9);
        $operation = self::OPERATIONS[array_rand(self::OPERATIONS)];

        line("Question: %s %s %s", $num1, $operation, $num2);
        $answer = prompt('Your answer');


        if ('+' === $operation) {
            $result = $num1 + $num2;
        } elseif ('-' === $operation) {
            $result = $num1 - $num2;
        } elseif ('*' === $operation) {
            $result = $num1 * $num2;
        } else {
            throw new \Exception('Неизвестная ошибка');
        }

        if ((int)$result !== (int)$answer) {
            err("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");

            return false;
        }

        return true;
    }
}

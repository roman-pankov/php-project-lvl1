<?php

namespace Brain\Games\Game\Calc;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = [
    '+',
    '-',
    '*',
];

function start(): void
{
    \Brain\Games\Engine\start(
        DESCRIPTION,
        function () {
            $operation = getOperation();

            $num1 = random_int(1, 99);
            $num2 = random_int(1, 99);

            $answer = getCorrectAnswer($num1, $num2, $operation);

            return [
                sprintf('%s %s %s', $num1, $operation, $num2),
                $answer,
            ];
        }
    );
}

function getOperation(): string
{
    return OPERATIONS[array_rand(OPERATIONS)];
}

function getCorrectAnswer(int $num1, int $num2, string $operation): string
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;

        case '-':
            return $num1 - $num2;

        case '*':
            return $num1 * $num2;

        default:
            throw new \Exception('Неизвестная ошибка');
    }
}

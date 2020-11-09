<?php

namespace Brain\Games\Game\Calc;

const OPERATIONS = [
    '+',
    '-',
    '*',
];

function start(): void
{
    \Brain\Games\Engine\start(
        description(),
        function () {
            $nums = generateNums();
            $operation = getOperation();
            $answer = correctAnswer($nums[0], $nums[1], $operation);

            return [
                sprintf('%s %s %s', $nums[0], $operation, $nums[1]),
                $answer,
            ];
        }
    );
}

function description(): string
{
    return 'What is the result of the expression?';
}

function generateNums(): array
{
    return [
        random_int(1, 99),
        random_int(1, 99)
    ];
}

function getOperation(): string
{
    return OPERATIONS[array_rand(OPERATIONS)];
}

function correctAnswer(int $num1, int $num2, string $operation): string
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

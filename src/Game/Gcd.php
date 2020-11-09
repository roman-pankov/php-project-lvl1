<?php

namespace Brain\Games\Game\Gcd;

function start(): void
{
    \Brain\Games\Engine\start(
        description(),
        function () {
            $nums = generateNums();
            $answer = correctAnswer($nums[0], $nums[1]);

            return [
                sprintf('%s %s', ...$nums),
                $answer,
            ];
        }
    );
}

function description(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function generateNums(): array
{
    return [
        random_int(1, 99),
        random_int(1, 99)
    ];
}

function correctAnswer(int $num1, int $num2): string
{
    return gcd($num1, $num2);
}

function gcd(int $n, int $m): int
{
    return $m ? gcd($m, $n % $m) : $n;
}

<?php

namespace Brain\Games\Game\Even;

function start(): void
{
    \Brain\Games\Engine\start(
        description(),
        function () {
            $num = generateNum();
            $answer = correctAnswer($num);

            return [
                (string)$num,
                $answer,
            ];
        }
    );
}

function description(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function generateNum(): int
{
    return random_int(2, 100);
}

function correctAnswer(int $num): string
{
    return isEven($num)
        ? 'yes'
        : 'no';
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

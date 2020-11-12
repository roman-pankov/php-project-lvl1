<?php

namespace Brain\Games\Game\Even;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function start(): void
{
    \Brain\Games\Engine\start(
        DESCRIPTION,
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

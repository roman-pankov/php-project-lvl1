<?php

namespace Brain\Games\Game\Prime;

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
    return isPrime($num)
        ? 'yes'
        : 'no';
}


function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

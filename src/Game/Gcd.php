<?php

namespace Brain\Games\Game\Gcd;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function start(): void
{
    \Brain\Games\Engine\start(
        DESCRIPTION,
        function () {
            $num1 = random_int(1, 99);
            $num2 = random_int(1, 99);

            $answer = (string)gcd($num1, $num2);

            return [
                sprintf('%s %s', $num1, $num2),
                $answer,
            ];
        }
    );
}

function gcd(int $n, int $m): int
{
    return $m ? gcd($m, $n % $m) : $n;
}

<?php

namespace Brain\Games\Game\Progression;

function start(): void
{
    \Brain\Games\Engine\start(
        description(),
        function () {
            $step = random_int(2, 3);
            $start = random_int(1, 100);
            $len = random_int(10, 20);

            $progression = generateProgression(
                $step,
                $start,
                $len
            );

            $key = array_rand($progression);

            $answer = $progression[$key];

            $progression[$key] = '..';

            return [
                implode(' ', $progression),
                (string)$answer,
            ];
        }
    );
}

function description(): string
{
    return 'What number is missing in the progression?';
}

function generateNums(): array
{
    return [
        random_int(1, 99),
        random_int(1, 99)
    ];
}


function generateProgression(int $step, int $start, int $len): array
{
    $progression = [];

    for ($i = 0; $i < $len; $i++) {
        $progression[] = $start + ($step * $i);
    }

    return $progression;
}
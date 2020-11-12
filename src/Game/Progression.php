<?php

namespace Brain\Games\Game\Progression;

const DESCRIPTION = 'What number is missing in the progression?';

function start(): void
{
    \Brain\Games\Engine\start(
        DESCRIPTION,
        function () {
            $step = random_int(2, 3);
            $start = random_int(1, 100);
            $len = random_int(10, 20);

            $progression = generateProgression(
                $step,
                $start,
                $len
            );

            $hiddenMemberIndex = array_rand($progression);

            $answer = $progression[$hiddenMemberIndex];

            $progression[$hiddenMemberIndex] = '..';

            return [
                implode(' ', $progression),
                (string)$answer,
            ];
        }
    );
}

function generateProgression(int $step, int $start, int $len): array
{
    $progression = [];

    for ($i = 0; $i < $len; $i++) {
        $progression[] = $start + ($step * $i);
    }

    return $progression;
}

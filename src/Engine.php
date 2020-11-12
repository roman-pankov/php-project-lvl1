<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ATTEMPT_COUNT = 3;

function start(string $description, callable $makeRoundData): void
{
    line('Welcome to the Brain Games!');
    $username = prompt('May I have your name?');
    line("Hello, %s!", $username);

    line($description);

    for ($attempt = 0; $attempt < ATTEMPT_COUNT; $attempt++) {
        [$question, $correctAnswer] = $makeRoundData();

        line("Question: %s", $question);

        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $username);

            return;
        }
    }

    line('Congratulations, %s!', $username);
}

<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ATTEMPT = 3;

function start(string $description, callable $game): void
{
    line('Welcome to the Brain Games!');
    $username = prompt('May I have your name?');
    line("Hello, %s!", $username);

    line($description);

    for ($attempt = 0; $attempt < ATTEMPT; $attempt++) {
        [$question, $correctAnswer] = $game();

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

<?php

namespace Brain\Games\Even;

use function cli\err;
use function cli\line;
use function cli\prompt;

const ATTEMPT_SUCCESS = 3;
const VARIANT_ANSWERS = [
    1 => 'no',
    0 => 'yes',
];

line('Welcome to the Brain Games!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

for ($attempt = 0; $attempt < ATTEMPT_SUCCESS; $attempt++) {
    $num = rand(1, 100);

    line("Question: %s", $num);
    $answer = prompt('Your answer');

    $key = ($num % 2);

    if (VARIANT_ANSWERS[$key] !== $answer) {
        err("'yes' is wrong answer ;(. Correct answer was 'no'.");
        err("Let's try again, %s", $name);
        die();
    }

    line('Correct!');
}

line('Congratulations, %s!', $name);

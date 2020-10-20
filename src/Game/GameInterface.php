<?php

namespace Brain\Games\Game;

interface GameInterface
{
    /**
     * Начало игры
     * @param string $username Имя пользователя
     * @return int Код, с которой завершилась игра
     */
    public function start(string $username): int;
}

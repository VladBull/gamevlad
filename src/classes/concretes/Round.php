<?php

namespace App\Classes\Concretes;

class Round
{
    public function getRound(): int
    {
        return $this->round;
    }

    public function setRound(string $round): void
    {
        $this->round = $round;
    }
}
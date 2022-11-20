<?php

namespace App\Classes\Concretes;

use App\Classes\Abstracts\Character;
use App\Classes\Concretes\Abilities\Revive;
use App\Traits\HasAbilities;


class Angel extends Character
{
    use HasAbilities;

    public function __construct(string $name,float $health, float $mana, string $race)
    {
        $this->setName($name);
        $this->setHealth($health);
        $this->setMana($mana);
        $this->setRace($race);
        $this->setRace("Angel");
    }
    function getAvailableAbilities(): array
    {
        return [
            Revive::class
        ];
    }
}
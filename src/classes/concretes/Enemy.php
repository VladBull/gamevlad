<?php

namespace App\Classes\Concretes;

use App\Classes\Abstracts\Character;
use App\Classes\Concretes\Abilities\Heal;
use App\Classes\Concretes\Abilities\PoisonAttack;
use App\Classes\Concretes\Abilities\PowerAttack;
use App\Traits\HasAbilities;


class Enemy extends Character
{
    use HasAbilities;

    public function __construct(string $name,float $health, float $mana, string $race)
    {
        $this->setName($name);
        $this->setHealth($health);
        $this->setMana($mana);
        $this->setRace($race);
        $this->setType("Enemy");
    }

    function getAvailableAbilities(): array
    {
        return [
            Heal::class,
            PowerAttack::class,
            PoisonAttack::class,
        ];
    }
}
<?php

namespace App\Classes\Concretes\Abilities;

use App\Classes\Abstracts\Ability;

class PowerAttack extends Ability
{
    public function __construct()
    {
        $this->setName("PowerAttack");
        $this->setDescription("Powerful attack");
    }

    public function triggerAbility()
    {
        return 40;
    }

    public function getManaCost()
    {
        return 50;
    }
}
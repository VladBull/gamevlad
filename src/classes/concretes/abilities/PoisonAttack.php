<?php

namespace App\Classes\Concretes\Abilities;

use App\Classes\Abstracts\Ability;

class PoisonAttack extends Ability
{
    public function __construct()
    {
        $this->setName('PoisonAttack');
        $this->setDescription('Poison proc');
    }

    public function triggerAbility()
    {
        return 5;
    }
    
    public function getManaCost()
    {
        return 20;
    }
}
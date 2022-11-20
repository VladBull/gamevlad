<?php

namespace App\Classes\Concretes\Abilities;

use App\Classes\Abstracts\Ability;

class Heal extends Ability
{
    public function __construct()
    {
        $this->setName("Heal");
        $this->setDescription("Heal the character");
    }

    public function triggerAbility()
    {
        return 20;
    }

    public function getManaCost()
    {
        return 50;
    }
}
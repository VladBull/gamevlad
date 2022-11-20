<?php

namespace App\Classes\Concretes\Abilities;

use App\Classes\Abstracts\Ability;

class Revive extends Ability
{
    public function __construct()
    {
        $this->setName('Revive');
        $this->setDescription('Revives hero/enemy from death');
    }
    
    public function triggerAbility()
    {
        return 10;
    }
    
    public function getManaCost()
    {
        return 50;
    }
}

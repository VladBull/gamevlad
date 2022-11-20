<?php

namespace App\Interfaces;

interface ICharacter
{
    public function attack(ICharacter $character);
    public function receiveDamage(float $damagePoints);
    // public function recieveHealth(float $healthPoints);
}
<?php

namespace App\Classes\Abstracts;

use App\Interfaces\ICharacter;

abstract class Character implements ICharacter
{
    private string $name;
    private float $health;
    private float $mana;
    private string $type;
    private string $race;
    private float $characterPower;

     public function getName(): string
    {
        return $this->name;
    }

      protected function setName(string $name): void
    {
        $this->name = $name;
    }

     public function getHealth(): float
    {
        return $this->health;
    }

       public function setHealth(float $health): void
    {
        $this->health = $health;
    }

       public function getMana(): float
    {
        return $this->mana;
    }

       public function setMana(float $mana): void
    {
        $this->mana = $mana;
    }

    public function addMana(float $amount)
    {
        $this->mana += $amount;
    }

      public function getType(): string
    {
        return $this->type;
    }

      protected function setType(string $type): void
    {
        $this->type = $type;
    }

      public function getRace(): string
    {
        return $this->race;
    }

      protected function setRace(string $race): void
    {
        $this->race = $race;
    }

    public function getcharacterPower(): float
    {
        return $this->characterPower;
    }

       public function setcharacterPower(float $characterPower): void
    {
        $this->characterPower = $characterPower;
    }

    public function attack(ICharacter $character, float $amount = null)
    {
        if($amount === null)
        {
            $character->receiveDamage($this->characterPower);
        }
        else{
            $character->receiveDamage($this->characterPower + $amount);
        }
    }

    public function receiveDamage(float $damagePoints)
    {
        $this->health -= $damagePoints;

        if($this->health < 0)
        {
            $this->health = 0;
        }
    }
    
}
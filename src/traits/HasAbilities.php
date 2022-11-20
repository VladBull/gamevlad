<?php

namespace App\Traits;

trait HasAbilities
{
    private array $abilities;

     public function getAbilities(): array
    {
        return $this->abilities;
    }

    public function setAbilities(array $abilities): void
    {
        $this->abilities = $abilities;
    }

    public function addAbility(string $ability)
    {
        if(in_array($ability,$this->getAvailableAbilities()))
        {
            $this->abilities[] = $ability;
        }
        else{
            throw new \Exception("Ability not found");
        }
    }

    public function triggerAbility(string $abilityName)
    {
        foreach ($this->abilities as $ability)
        {
            if($ability === $abilityName)
            {
                $a = new $abilityName();

                switch ($a->getName())
                {
                    case "Heal":
                        if($this->getMana() >= $a->getManaCost()){
                            $returnedHp = $a->triggerAbility();
                            $this->setMana($this->getMana() - $a->getManaCost());
                            $this->setHealth($this->getHealth() + $returnedHp);
                            if($this->getHealth() > 100)
                                $this->setHealth(100);
                        }
                        else
                        {
                            echo "Insufficient mana".'<br>';
                        }
                        break;
                        
                    case "Revive":
                            
                        if($this->getMana() >= $a->getManaCost()){
                            $reviveHp = $a->triggerAbility();
                            $this->setMana($this->getMana() - $a->getManaCost());
                            $this->setHealth($this->getHealth() + $reviveHp);
                            }
                        
                        else
                        {
                            echo "Insufficient mana to revive!".'<br>';
                        }
                        break;

                    case "PowerAttack":
                        if($this->getMana() >= $a->getManaCost())
                        {
                            $this->setMana($this->getMana() - $a->getManaCost());
                            return $a->triggerAbility();
                        }
                }
            }
        }
    }

    abstract function getAvailableAbilities():array;
}
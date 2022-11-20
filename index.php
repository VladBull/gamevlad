<?php

require('vendor/autoload.php');

use App\Classes\Concretes\Abilities\Heal;
use App\Classes\Concretes\Hero;
use App\Classes\Concretes\Enemy;
use App\Classes\Concretes\Angel;
use App\Classes\Concretes\Abilities\PowerAttack;
use App\Classes\Concretes\Abilities\CriticalAttack;
use App\Classes\Concretes\Abilities\PoisonAttack;
use App\Classes\Concretes\Abilities\Revive;
use App\Classes\Concretes\Round;

$hero = new Hero("Vlad",300,100,"Human");
$hero->setcharacterPower(10);
$hero->addAbility(Heal::class);
$hero->addAbility(CriticalAttack::class);
$hero->addAbility(PowerAttack::class);

$enemy = new Enemy("Diablo",300,100,"Demon");
$enemy->setcharacterPower(10);
$enemy->addAbility(Heal::class);
$enemy->addAbility(PowerAttack::class);
$enemy->addAbility(PoisonAttack::class);  //De gandit cum pot sa il fac sa ia viata timp de 3 ture


$angel = new Angel('Preafericitul Daniel',0,50,"Angel");
$angel->setcharacterPower(10);
$angel->addAbility(Revive::class);

$round = new Round();
$round=1;


// poison for i // for

while($hero->getHealth() > 0 && $enemy->getHealth() > 0)
{
        
    $random = rand(0,1);

    $hero->addMana(15);
    $enemy->addMana(15);


    if($random === 0)
    {
        $random = rand(0,3);

        if($random === 3)
        {
            $hero->attack($enemy,$hero->triggerAbility(PowerAttack::class));
            echo $round.') '.'<span style="color:RED;"><b>Hero power attacked enemy:</b></span> Enemy hp: '.$enemy->getHealth(); 
            echo "</br>";
        }
        else{
            $hero->attack($enemy);
            echo $round.') '."Hero attacked enemy: Enemy hp: ".$enemy->getHealth();   
            echo "</br>";
        }



        $random = rand(0,3);

        if($random === 2 && $enemy->getHealth() > 0)
        {
            if($enemy->getHealth() < 80){
                $enemy->triggerAbility(Heal::class);
                echo $round.') '.'<span style="color:GREEN;"><b>Enemy healed himself: </b></span> Enemy health: ' . $enemy->getHealth();
                echo "</br>";
            }
        }
    }
    elseif ($random === 1)
    {
        
        $random = rand(0,3);

        if($random === 3)
        {
            $enemy->attack($hero,$enemy->triggerAbility((PowerAttack::class)));
            echo $round.') '.'<span style="color:RED;"><b>Enemy power attacked hero:</b></span> Hero hp: '.$hero->getHealth();

            echo "</br>";
                }

     else{   
        $enemy->attack($hero);
        echo $round.') '."Enemy attacked hero: Hero hp: ". $hero->getHealth();
        echo "</br>";
     }
        $random = rand(0,3);

        if($random === 2 && $hero->getHealth() > 0)
        {
            if($hero->getHealth() < 80){
                $hero->triggerAbility(Heal::class);
                echo $round.') '.'<span style="color:GREEN;"><b>Hero healed himself: </b></span> Hero hp ' . $hero->getHealth();
                echo "</br>";
            }
        }
    }

    if($hero->getHealth() == 0)
    {
        $random = rand(0,5);

        if($random === 1)
        {
            $angel->triggerAbility(Revive::class);
            $hero->setHealth(10);
            echo $round.') '.'<span style="color:BLUE;"><b>Hero was revived by an angel!</b></span> Hero hp: '.$hero->gethealth();
            echo "<br>";
        }
        elseif($random !== 0)
        {
            break 1; 
        }
    }

    elseif($enemy->getHealth() == 0) //enemy revive nu intra in rounds
    {
        $random = rand(0,5);

        if($random === 1)
        {
            $angel->triggerAbility(Revive::class);
            $enemy->setHealth(10);//call puterea nu constanta. de asemenea nu tine cont de mana. spune ca nu are mana dar da revive. nu merge nici la heal
            echo '<span style="color:BLUE;"><b>Enemy was revived by an angel!</b></span> Enemy hp: '.$enemy->gethealth();
            echo "<br>"; 
        }
        elseif($random !== 0)
        {
            break 1; 
        }
    }
    
    $round ++;

}


if($hero->getHealth() > 0)
{
    $round = $round - 1;

    echo '<br>'.$hero->getname().' the <b>hero</b> won in '.$round.' rounds with '.$hero->getHealth().' life left!';
}
else
{
    $round = $round - 1;
    echo '<br>'.$enemy->getname().' the <b>enemy</b> won in '.$round.' rounds with '.$enemy->getHealth().' life left!';
}



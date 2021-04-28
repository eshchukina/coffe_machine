<?php


include 'autoload.php';



$cup = new CoffeeMachine\Container(500);
$myCoffeeMachine = CoffeeMachine\Factory::createLarge();
$myCoffeeMachine->addGrains(1000);
$myCoffeeMachine->addWater(1000);
$myCoffeeMachine->addMilk(1000);

$myCoffeeMachine->putCup($cup);
$myCoffeeMachine->on();

//$latte = new Recipe("Latte", 20, 20, 10);
//$myCoffeeMachine->setRecipe($latte);

$cappuccino = new CoffeeMachine\Recipe("Cappuccino", 20, 20, 10);
$myCoffeeMachine->setRecipe($cappuccino);

//$espresso = new Recipe("Espresso", 30, 0, 10);
//$myCoffeeMachine->setRecipe($espresso);

$myCoffeeMachine->startCook();
$myCoffeeMachine->takeCup();


echo '-----------' . PHP_EOL;
echo 'Information about the coffee machine: ' . PHP_EOL;
echo '- cup: ' . $cup->getCapacity() . PHP_EOL;
$myCoffeeMachine->printState();


echo '------------------------------------------------------' . PHP_EOL;

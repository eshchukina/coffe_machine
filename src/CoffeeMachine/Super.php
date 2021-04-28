<?php

namespace CoffeeMachine;

class Super implements CoffeeMachine {
 	private $cup; //state 
    private $waterContainer;
    private $milkContainer;
    private $grainsContainer;// dependancy
    private $recipe; //state
    private $trashContainer;
    
    
	public function __construct(
        Container $grainsContainer, 
        Container $waterContainer, 
        Container $milkContainer,
        Container $trashContainer,
    ) 

        {
		$this->grainsContainer = $grainsContainer;
        $this->milkContainer = $milkContainer;
        $this->waterContainer = $waterContainer;
        $this->trashContainer = $trashContainer;
        
	}

    public function on() {
        $this->elec = true;
      
    }

    public function off() {
        $this->elec = false;
      
    }


	public function putCup(Container $cup) {
        $this->cup = $cup;
    }
    
	public function takeCup() {
        $a = $this->getCup();
        $this->cup = null;
        return $a; 
    }

    private function getCup() {
        return $this->cup;
    }

	public function addGrains(int $vol) {
		$this->grainsContainer->add($vol);
	}

	public function addMilk(int $vol) {
		$this->milkContainer->add($vol);
	}

 	public function addWater(int $vol) {
        $this->waterContainer->add($vol);
	}

    private function addTrash(int $vol) {
		$this->trashContainer->add($vol);
	}

    public function setRecipe(Recipe $recipe) {
        $this->recipe = $recipe;
    }  
    
    public function printState(){

        echo '- water container: ' . $this->waterContainer->getCapacity() . PHP_EOL;
        echo '- grains container: ' . $this->grainsContainer->getCapacity() . PHP_EOL;
        echo '- milk container: ' . $this->milkContainer->getCapacity() . PHP_EOL;
        echo '- trash container: ' . $this->trashContainer->getCapacity() . PHP_EOL;

    }

    private function canCook(){

        if($this->elec == false) {
            echo "Error: no electricity" . PHP_EOL; 
                return false;
        }

        if ($this->cup == null) {
            echo "Error: no cup" . PHP_EOL;
                return false;
        }

        if ($this->recipe == null) {
            echo "Error: please specify recipe" . PHP_EOL;
                return false;
        }
        
        if($this->waterContainer->getCapacity() < $this->recipe->getWater()) {
            echo "Error: not enough water" . PHP_EOL;
                return false;
        }

        if($this->grainsContainer->getCapacity() < $this->recipe->getGrains()) {
            echo "Error: not enough grains" . PHP_EOL;
                return false;
        }

        if($this->milkContainer->getCapacity() < $this->recipe->getMilk()) {
            echo "Error: not enough milk" . PHP_EOL;
                return false;
        }

        if( $this->trashContainer->getVolume() - $this->trashContainer->getCapacity() < $this->recipe->getGrains()) {
            echo "Error: not enough capacity for trash" . PHP_EOL;
                return false;
        }
        return true;
    }


    private function cook(){
        $w = $this->waterContainer->fetch($this->recipe->getWater());
        $g = $this->grainsContainer->fetch($this->recipe->getGrains());
        $m = $this->milkContainer->fetch($this->recipe->getMilk()); 

        $this->cup->add($w);
        $this->cup->add($g);
        $this->cup->add($m);

        $trash = $g;
        $this->addTrash($trash);
    }

    public function startCook() {

        if(!$this->canCook()){

            return;
        }

        $this->cook();
        $this->showInfo();
    }
          
    private function showInfo(){

        $morning = "Good morning!";
        $day = "Good afternoon!";
        $evening = "Good evening!";
        $night = "Good night!";
            
        $hour = date("i");
        $hour = date("H");
            
        if($hour >= 04) {$hello = $morning;}
        if($hour >= 10) {$hello = $day;}
        if($hour >= 16) {$hello = $evening;}
        if($hour >= 22 or $hour < 04) {$hello = $night;}
            
        echo "Time: $hour:$hour, $hello" . PHP_EOL;

        echo  "your super " . $this->recipe->getTitle() . " cooked" .  PHP_EOL;
        if ($this->recipe->getTitle() == "Latte") { 
            echo "price 100 $".  PHP_EOL;
        }     

        if ($this->recipe->getTitle() == "Cappuccino") {
            echo "price 90 $".  PHP_EOL;
        }

        if ($this->recipe->getTitle() == "Espresso") { 
            echo "price 80 $".  PHP_EOL;
        }       
    }
}


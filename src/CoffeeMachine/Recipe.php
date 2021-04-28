<?php

namespace CoffeeMachine;


class Recipe {
    private $milk;
    private $water;
    private $grains;
    private $title;

   public function __construct(string $title, int $water, int $milk, int $grains) {  
        $this->water = $water;
        $this->milk = $milk;
        $this->grains = $grains;
        $this->title = $title;
    }    

    public function getTitle() {
        return $this->title;
    }

    public function getWater() {
        return $this->water;
    }

    public function getMilk() {
        return $this->milk;
    }
 
    public function getGrains() {
        return $this->grains;
    }
}
 
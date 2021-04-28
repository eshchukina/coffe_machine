<?php


namespace CoffeeMachine;

interface CoffeeMachine {
 	public function putCup(Container $cup);
	public function takeCup();
 	public function startCook();
 	public function addGrains(int $vol);
 	public function addMilk(int $vol);
 	public function addWater(int $vol);
    public function on();
    public function off();
   
 }
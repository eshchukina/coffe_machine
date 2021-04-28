<?php

namespace CoffeeMachine;


class Factory {

    static public function create (){
        $grainsContainer = new Container(100);
        $waterContainer = new Container(100);
        $milkContainer = new Container(100);
        $trashContainer = new Container(100);
        $myCoffeeMachine = new Standard($grainsContainer, $waterContainer, $milkContainer, $trashContainer);

        return $myCoffeeMachine;
    }


    static public function createLarge (){
        $grainsContainer = new Container(1000);
        $waterContainer = new Container(1000);
        $milkContainer = new Container(1000);
        $trashContainer = new Container(1000);
        $myCoffeeMachine = new Super($grainsContainer, $waterContainer, $milkContainer, $trashContainer);

        return $myCoffeeMachine;
    }

}   


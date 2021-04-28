<?php

namespace CoffeeMachine;


class Container {
    private $volume; //property 
    private $capacity; //state 

    public function __construct(int $volume) {
        $this->volume = $volume;
        $this->capacity = 0;
    }

    public function add(int $someVolume) {
        if ($this->capacity + $someVolume > $this->volume) {
            $this->capacity = $this->volume;
            echo "Error: not enought space in the container." . PHP_EOL;
                return;
        }

        $this->capacity = $this->capacity + $someVolume;
    }

    public function fetch(int $someVolume) {
        
        if ($this->capacity - $someVolume < 0) {
            $ret = $this->capacity;
            $this->capacity = 0;
                return $ret;
        }   
        $this->capacity = $this->capacity - $someVolume;
        return $someVolume; if ($this->capacity - $someVolume < 0) {
            $ret = $this->capacity;
            $this->capacity = 0;
                return $ret;
        }   
        $this->capacity = $this->capacity - $someVolume;
            return $someVolume;
    }

    public function isEmpty() {
        if ($this->capacity == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getCapacity(){
        return $this->capacity;
    }
}
<?php

class User {
    protected $name, $age , $ballance;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
    public function __get($property){
        if(property_exists(__CLASS__,$property)){
            return $this->$property;
        }
    }
    public function __set($property,$value){
        if(property_exists(__CLASS__,   $property)){
            $this->$property = $value ;
        }
    }
}


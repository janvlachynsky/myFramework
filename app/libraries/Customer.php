<?php


class Customer extends User
{
    protected $ballance;

    public function __construct($name, $age, $ballance)
    {
        parent::__construct($name, $age);
        $this->ballance = $ballance;

    }
    public function pay(){

    }

}
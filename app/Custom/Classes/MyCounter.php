<?php namespace App\Custom\Classes;

class MyCounter
{
    protected $counter;

    public function __construct()
    {
        $this->counter = 0;
    }

    public function increment()
    {
        return ++$this->counter;
    }

    public function decrement()
    {
        return --$this->counter;
    }

    public function getValue()
    {
        return $this->counter;
    }
}
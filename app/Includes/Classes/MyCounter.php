<?php namespace App\Includes\Classes;

use App\Includes\Interfaces\CounterInterface;

class MyCounter implements CounterInterface
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
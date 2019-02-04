<?php namespace App\Includes\Interfaces;

interface CounterInterface
{
    public function increment();
    public function decrement();
    public function getValue();
}
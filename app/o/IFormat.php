<?php


namespace App\O;


interface IFormat
{
    public function getData(int $id, string $name, float $price);

    public function printData();
}
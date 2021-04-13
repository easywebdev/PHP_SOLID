<?php


namespace App\D;


interface IEncDecMethod
{
    public function encodeData(string $data);

    public function decodeData(string $encode);
}
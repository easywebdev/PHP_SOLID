<?php


namespace App\L;


class Square extends Rectangle
{
    public function setWidth(float $width)
    {
        parent::setWidth($width);
        parent::setHeight($width);
    }

    public function setHeight(float $height)
    {
        parent::setHeight($height);
        parent::setWidth($height);
    }
}
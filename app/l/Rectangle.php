<?php


namespace App\L;


class Rectangle
{
    /**
     * @var float
     */
    private float $width;

    /**
     * @var float
     */
    private float $height;

    /**
     * @param float $width
     */
    public function setWidth(float $width)
    {
       $this->width = $width;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }
}
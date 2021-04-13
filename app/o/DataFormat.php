<?php


namespace App\O;


class DataFormat
{
    /**
     * @var
     */
    private IFormat $format;

    /**
     * @param IFormat $format
     */
    public function setFormat(IFormat $format)
    {
        $this->format = $format;
    }

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     */
    public function setData(int $id, string $name, float $price)
    {
        $this->format->getData($id, $name, $price);
    }

    /**
     * @return mixed
     */
    public function printData()
    {
        return $this->format->printData();
    }
}
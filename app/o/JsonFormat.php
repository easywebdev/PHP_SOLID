<?php


namespace App\O;


class JsonFormat implements IFormat
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     */
    public function getData(int $id, string $name, float $price)
    {
        $this->data['id'] = $id;
        $this->data['Name'] = $name;
        $this->data['Price'] = $price;
    }

    /**
     * @return false|string
     */
    public function printData()
    {
        return json_encode($this->data);
    }
}
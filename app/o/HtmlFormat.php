<?php


namespace App\O;


class HtmlFormat implements IFormat
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $price;

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     */
    public function getData(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function printData()
    {
        return "
        <div style=\"background-color: gray\">
            <h2 style='color: darkgoldenrod'>Model information</h2>
            <p><b>ID:</b>$this->id</p>
            <p><b>Name:</b>$this->name</p>
            <p><b>Price:</b>$this->price</p>
        </div>
        ";
    }
}
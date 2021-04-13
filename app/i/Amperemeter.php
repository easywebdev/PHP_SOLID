<?php


namespace App\I;


class Amperemeter implements IDevice, IAmperemeter
{
    /**
     *
     */
    public function showName()
    {
        echo '<div><b>Name: </b>Keithley 200</div>';
    }

    /**
     *
     */
    public function showAmpere()
    {
        echo '<div><b>Current: </b>I = 1.5 [A]</div>';
    }
}
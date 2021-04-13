<?php


namespace App\I;


class Multimeter implements IDevice, IVoltmeter, IAmperemeter
{
    /**
     *
     */
    public function showName()
    {
        echo '<div><b>Name: </b>Keithley 2000</div>';
    }

    /**
     *
     */
    public function showVoltage()
    {
        echo '<div><b>Voltage: </b>V = 2,5 [V]</div>';
    }

    /**
     *
     */
    public function showAmpere()
    {
        echo '<div><b>Current: </b>I = 0.67 [A]</div>';
    }
}
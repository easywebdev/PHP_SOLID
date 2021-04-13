<?php


namespace App\I;


class Voltmeter implements IDevice, IVoltmeter
{
    /**
     *
     */
    public function showName()
    {
        echo '<div><b>Name: </b>Keithley 2182</div>';
    }

    /**
     *
     */
    public function showVoltage()
    {
        echo '<div><b>Voltage: </b>V = 10 [V]</div>';
    }
}
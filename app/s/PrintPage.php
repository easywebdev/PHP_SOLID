<?php


namespace App\S;


class PrintPage
{
    /**
     * @param string $pass
     * @param string $hash
     * @param bool $check
     */
    public function printHTML(string $pass, string $hash, bool $check)
    {
        $res = 'Wrong';

        if($check) {
            $res = 'Correct';
        }

        echo "
              <div><b>Password: </b>$pass</div>
              <div><b>Hash: </b>$hash</div>
              <div><b>Check result: </b>$res</div>
              ";
    }
}
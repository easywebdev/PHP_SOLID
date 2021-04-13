<?php


namespace App\S;


class Passwords
{
    /**
     * @param string $pass
     * @return false|string|null
     */
    public function createHash(string $pass)
    {
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        return $hash;
    }

    /**
     * @param string $pass
     * @param string $hash
     * @return bool
     */
    public function checkPass(string $pass, string $hash) : bool
    {
        return password_verify($pass, $hash);
    }
}
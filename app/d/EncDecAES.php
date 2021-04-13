<?php


namespace App\D;


class EncDecAES implements IEncDecMethod
{
    /**
     * @var string
     */
    private $method = 'AES-192-CBC';

    /**
     * @var
     */
    private $ivlen;

    /**
     * @var
     */
    private $iv;

    public function __construct()
    {
        $this->ivlen = openssl_cipher_iv_length($this->method);
        $this->iv = openssl_random_pseudo_bytes($this->ivlen);
    }

    /**
     * @var string
     */
    private $key = 'keystring';

    /**
     * @param string $data
     * @param string $key
     * @return false|string
     */
    public function encodeData(string $data)
    {
        return openssl_encrypt($data, $this->method, $this->key, 0, $this->iv);
    }

    /**
     * @param string $encode
     * @param string $key
     * @return false|string
     */
    public function decodeData(string $encode)
    {
        return openssl_decrypt($encode, $this->method, $this->key, 0, $this->iv);
    }
}
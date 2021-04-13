<?php


namespace App\D;


class Encryptor
{
    /**
     * @var null
     */
    private $data = null;

    /**
     * @var bool
     */
    private $encode = false;

    /**
     * @var bool
     */
    private $decode = false;

    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param IEncDecMethod $method
     */
    public function testEncoding(IEncDecMethod $method)
    {
        // Encoding
        if($this->data !== null) {
            $this->encode = $method->encodeData($this->data);
        }

        // Decoding
        if($this->encode) {
            $this->decode = $method->decodeData($this->encode);
        }
    }

    /**
     * @return string
     */
    public function printResults() {
        echo "
                <div>
                    <div><b>Original Data: </b>$this->data</div>
                    <div><b>Encode: </b>$this->encode</div>
                    <div><b>Decode: </b>$this->decode</div>
                </div>
                ";
    }
}
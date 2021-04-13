<?php

namespace Solid;

require_once '../vendor/autoload.php';

use App\S\Passwords;
use App\S\PrintPage;

use App\O\DataFormat;
use App\O\JsonFormat;
use App\O\HtmlFormat;

use App\L\Rectangle;
use App\L\Square;

use App\I\Voltmeter;
use App\I\Amperemeter;
use App\I\Multimeter;

use App\D\EncDecAES;
use App\D\EncDecRSA;
use App\D\Encryptor;

echo '<h1>SOLID</h1>';

/**
 * "S"
 * This code demonstrate Single responsibility concept.
 * One class - one responsibility.
 *
 * Code below generate the hash of the password, check it and print results.
 * We have two different tasks (responsibilities):
 * (1) - generate hash and check password by hash,
 * (2) - print results.
 * This tasks are separated on two classes: 'Passwods' and 'PrintPage'
 */

echo '<h2>(S) Password check result</h2>';

// Create objects
$paswords = new Passwords();
$print = new PrintPage();

// Generate hash
$pass = 'abcd';
$hash = $paswords->createHash($pass);

// Check and print results
if($hash) {
    $check = $paswords->checkPass($pass, $hash);
    $print->printHTML($pass, $hash, $check);
}

/**
 * "O"
 * This code demonstrate Open-close concept.
 * The Class is open for expanding and close for modification
 * Really it means we need to have a way change Class's behaviour but don't change code in Class.
 * In other words don't change code of Class methods but we have possibility to change their realisation
 * We have to use Interface and several realisations fo it. The method gets Interface as parameter and in this
 * case we can put different realization as parameter and gets different behaviour of Class without code changing
 *
 * Code below return result of data format. Data can be returned by two formats (html & json)
 * We can get any format from Class and no any cod in Class methods need to change.
 */

echo '<h2>(O) Data format: HTML/JSON</h2>';

// Create main object. It is exemplar of Class witch has Open-close concept
$dataFormat = new DataFormat();

// Create objects of two realization. Two different behaviours.
$htmlFormat = new HtmlFormat();
$jsonFormat = new JsonFormat();

// Next we can set format data use as parameter '$htmlFormat' or '$jsonFormat'.
// We don't need any code changes in 'DataFormat'
// First use JSON
$dataFormat->setFormat($jsonFormat);
$dataFormat->setData(1, 'Model-1', 123.56);
echo $dataFormat->printData();

// Second HTML format
$dataFormat->setFormat($htmlFormat);
$dataFormat->setData(1, 'Model-1', 123.56);
echo $dataFormat->printData();

/**
 * "L"
 * This code demonstrate Liskov substitution concept.
 * The child class methods must be predicted and don't change the properties of parent class methods.
 * The preconditions (executed by called side) cannot be reinforced.
 * The postconditions (guaranteed/returned by called method) cannot be weakened.
 *
 * The code below shows example. The code shows problem in a simple example where Square is child of Rectangle.
 * Example shows only problem, not right solution. Right solution in this case is that Square is not good child of
 * Rectangle. There are must be separated instances.
 */

echo '<h2>(L) Liskov substitution</h2>';

// Function for Square calculation
function calculateSquare(Rectangle $rectangle, $width, $height)
{
    $rectangle->setWidth($width);
    $rectangle->setHeight($height);

    return $rectangle->getWidth() * $rectangle->getHeight();
}

// The code below shows that Square is not like a Rectangle.
// The Liskov substitution concept is not provided
echo '<div>' . calculateSquare(new Rectangle(), 4, 5) . '</div>';
echo '<div>' . calculateSquare(new Square(), 4, 5) . '</div>';

/**
 * "I"
 * This code demonstrate Interface segregation concept.
 * This concept is for Interface and it like a Single responsibility for class. If Interface has many different methods
 * it is no good idea because the class that it implemented must implement all this methods. Split one interface on
 * several interfaces is mo usable approach.
 *
 * The code below shows example. We have measurements devices: voltmeter, amperemeter, multimeter. All these devices
 * has names but voltmeter cam measure only voltage, amperemeter can measure only ampere, and multimeter can measure all.
 * It is useful if we create several interfaces for each function
 */

echo '<h2>(I) Interface segregation</h2>';

// This code shows Voltmeter functions
$voltmeter = new Voltmeter();
$voltmeter->showName();
$voltmeter->showVoltage();
echo '</br>';

// This code shows Amperemeter functions
$amperemeter = new Amperemeter();
$amperemeter->showName();
$amperemeter->showAmpere();
echo '</br>';

// This code shows Multimeter functions
$multimeter = new Multimeter();
$multimeter->showName();
$multimeter->showVoltage();
$multimeter->showAmpere();

/**
 * "D"
 * This code demonstrate Dependency inversion concept.
 * Up level modules haven't dependency of Low level modules. Abstractions haven't dependency of details (realizations).
 * Details must have dependency of abstraction. In class methods we have to use Interface as abstractions. In this case
 * we haven't any dependency of details.
 *
 * The code below shows example. The class Encryptor provide encryption and decryption data. The class Encryptor doesn't
 * depend of encryption/decryption methods. It is posible because we use interface IEncDecMethod and our abstraction
 * doesn't have any dependency of realization (encryption/decryption methods). Realizations EncDecAES and EncDecRSA
 * provide different encrypt/decrypt methods.
 */

echo '<h2>(D) Dependency inversion</h2>';



// Data for encode/decode testing
$data = 'Data for testing';

// Create object for main encode/decode testing class
$encryptor = new Encryptor();

// Create two different types for encoding:
// AES - one secret key for encoding and decoding
// RSA - two keys: public key for encoding and private key for decoding
$methodAES = new EncDecAES();
$methodRSA = new EncDecRSA();

// Test AES encoding method
$encryptor->setData($data);
$encryptor->testEncoding($methodAES);
$encryptor->printResults();

echo '</br>';

// Test RSA encoding method
$encryptor->setData($data);
$encryptor->testEncoding($methodRSA);
$encryptor->printResults();

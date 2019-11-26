### Speed Company PHP API Client

you can find usage of this library down here,

````php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "vendor/autoload.php";

## API authorization token
$token = '';

## create guzzle client
$client = new SpeedGuzzleAPIClient($token);

###1) method registerOrder: this method uses to create an order 
with below array as body of request:
$data = [
  "code"=> "125",
  "nationalId"=> "12345678910",
  "fullName"=> "Mohammad Ghaderi",
  "company"=> "",
  "phone"=> "02177477747",
  "mobile"=> "09121234567",
  "description"=> "nothing",
  "shift"=> 3, //value of one of the const variable of SpeedShift class
  "cod"=> 150000,
  "hasReturn"=> false,
  "returnDetails"=> "",
  "location"=> [
      "postalCode"=> "123456789",
      "address"=> "Address adress",
      "region"=> "8",
      "district"=> "narmak",
      "latitude"=> 35.731242,
      "longitude"=> 51.415501
  ],
  "deliveryDate"=> "2019-11-26T16:28:46.713Z"
];

$response = $client->registerOrder($data);

###2) method getOrder: this method uses to get order status with unique
 code that has been returned after register order by speed.

$response = $client->getOrder(speed_unique_code);

````

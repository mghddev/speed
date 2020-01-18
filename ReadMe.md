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
with below object as body of request:

$location_vo = new \mghddev\speed\ValueObjects\LocationVO();
$location_vo
    ->setPostalCode('1777777777')
    ->setAddress('this is address of mr test')
    ->setRegion(8)
    ->setDistrict('narmak');

$register_vo = new \mghddev\speed\ValueObjects\RegisterOrderVO();
$register_vo->setCode('125123')
    ->setNationalCode('0012497797')
    ->setFullName('test tespoor')
    ->setDeliveryDate(new DateTime('2020-12-29'))
    ->setCompany(null)
    ->setPhone('02177777777')
    ->setMobile('09127897897')
    ->setDescription('nothing')
    ->setShift(2)
    ->setCostOfDestination(1478520)
    ->setHasReturn(true)
    ->setReturnDetails('poolo begir biar bizahmat')
    ->setLocation($location_vo);

$client->registerOrder($register_vo)

###2) method getOrder: this method uses to get order status with unique
 code that has been returned after register order by speed.

$response = $client->getOrder(speed_unique_code);

````

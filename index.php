<?php


use mghddev\speed\SpeedAPIClient;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'vendor/autoload.php';

$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJBdXRob3JpemF0aW9uIiwiZXhwIjoxNjA1MDM2MTA3LCJqdGkiOiI2ZDg0N2MzYy1kNzc0LTQ2YzUtOWIwOS0wY2M5ZTNhNjdmNWIiLCJpYXQiOiIxMS8xMS8yMDE5IDE0OjIxOjQ3IiwidmVyIjoiMC4yIiwiaWQiOiIxMjAwIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvbmFtZSI6ImF6a2lkb3Rjb20iLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9CdXNpbmVzc093bmVySWQiOiIxIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQ2xpZW50LEFQSUNhbGxlciIsIm5iZiI6MTU3MzQ4MjEwNywiaXNzIjoiaHR0cDovL2xvY2FsaG9zdC9nYXRld2F5L2xvZ2luIiwiYXVkIjoiaHR0cDovL2xvY2FsaG9zdC9nYXRld2F5In0.KnEMzMyJItT7fgk9URs2MUTWsWs0Qufip4EZkc0M3XY';


$client = new SpeedAPIClient($token);

//var_dump($client->getOrder(8692063170));
$location_vo = new \mghddev\speed\ValueObjects\LocationVO();
$location_vo
    ->setPostalCode('1766744748')
    ->setAddress('this is address of mr test')
    ->setRegion(8)
    ->setDistrict('narmak');

$register_vo = new \mghddev\speed\ValueObjects\RegisterOrderVO();
$register_vo->setCode('125123')
    ->setNationalCode('0012497797')
    ->setDeliveryDate(new DateTime('2020-12-29'))
    ->setFullName('test tespoor')
    ->setPhone('02177471667')
    ->setMobile('09128049107')
    ->setDescription('nothing')
    ->setShift(2)
    ->setCostOfDestination(1478520)
    ->setHasReturn(true)
    ->setReturnDetails('poolo begir biar bizahmat')
    ->setLocation($location_vo);
//
//var_dump($client->registerOrder($register_vo));
var_dump($client->getOrder('3896190918'));

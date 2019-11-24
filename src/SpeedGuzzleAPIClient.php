<?php
namespace speed;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use mysql_xdevapi\Exception;
use speed\Exception\BadRequestException;
use speed\Exception\NotFoundException;
use speed\Exception\SpeedServerException;

class SpeedGuzzleAPIClient implements iSpeedGuzzleAPIClient
{

    /**
     * @var string
     */
    protected $default_config = ['base_uri' => 'http://userapitest.speedapp.co/userapi/orders'];

    /**
     * @var string
     */
    protected $authorization_token;

    /**
     * @var string
     */
    protected $base_uri;

    /**
     * @var Client
     */
    private $http_client;

    /**
     * SpeedGuzzleAPIClient constructor.
     * @param array $config
     * @param string $authorization_token
     */
    public function __construct(string $authorization_token, array $config = [])
    {
        $this->base_uri = $config['base_uri'] ?? $this->default_config['base_uri'];
        $this->http_client = new Client(['base_uri' => $this->base_uri]);
        $this->authorization_token = $authorization_token;
    }


    /**
     * @param string $unique_code
     * @return mixed
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws SpeedServerException
     * @throws GuzzleException
     */
    public function getOrder(string $unique_code)
    {
        $headers = ['Authorization' => 'bearer ' . $this->authorization_token];

        $result = $this->http_client->request(
            'get',
            '/' . $unique_code,
            [
                'headers' => $headers,
                'http_errors' => false
            ]
        );

        if ($result->getStatusCode() == 200) {
            return json_decode(
                $result->getBody()->getContents(),
                $assoc = true,
                $depth = 512,
                JSON_THROW_ON_ERROR
            );
        }

        if ($result->getStatusCode() == 400) {
            throw new BadRequestException($result->getBody()->getContents());
        }

        if ($result->getStatusCode() == 404) {
            throw new NotFoundException($result->getBody()->getContents());
        }

        if ($result->getStatusCode() == 500) {
            throw new SpeedServerException($result->getBody()->getContents());
        }

        throw new Exception($result->getBody()->getContents());


    }


    /**
     * @param array $data
     * @throws GuzzleException
     */
    public function registerOrder(array $data)
    {
        $headers = [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJBdXRob3JpemF0aW9uIiwiZXhwIjoxNjA1MDM2MTA3LCJqdGkiOiI2ZDg0N2MzYy1kNzc0LTQ2YzUtOWIwOS0wY2M5ZTNhNjdmNWIiLCJpYXQiOiIxMS8xMS8yMDE5IDE0OjIxOjQ3IiwidmVyIjoiMC4yIiwiaWQiOiIxMjAwIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvbmFtZSI6ImF6a2lkb3Rjb20iLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9CdXNpbmVzc093bmVySWQiOiIxIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQ2xpZW50LEFQSUNhbGxlciIsIm5iZiI6MTU3MzQ4MjEwNywiaXNzIjoiaHR0cDovL2xvY2FsaG9zdC9nYXRld2F5L2xvZ2luIiwiYXVkIjoiaHR0cDovL2xvY2FsaG9zdC9nYXRld2F5In0.KnEMzMyJItT7fgk9URs2MUTWsWs0Qufip4EZkc0M3XY',
            'Accept' => 'application/json'
        ];

        $result = $this->http_client->request(
            'post',
            '',
            [
                RequestOptions::HEADERS => $headers,
                'http_errors' => false,
                RequestOptions::JSON => $data
            ]
            );

        var_dump($result->getStatusCode());
        die();
    }

}

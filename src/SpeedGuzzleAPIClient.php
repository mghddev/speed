<?php
namespace speed;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use mysql_xdevapi\Exception;
use speed\Exception\BadRequestException;
use speed\Exception\NotFoundException;
use speed\Exception\SpeedServerException;
use speed\Exception\UnauthorizedException;

class SpeedGuzzleAPIClient implements iSpeedGuzzleAPIClient
{

    /**
     * @var string
     */
    protected $default_config = ['base_uri' => 'http://userapitest.speedapp.co'];

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
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws SpeedServerException
     */
    public function getOrder(string $unique_code)
    {
        $headers = [
            'Authorization' => "Bearer {$this->authorization_token}",
            'Content-Type' => 'application/json'
        ];

        $result = $this->http_client->request(
            'get',
            '/userapi/orders/' . $unique_code,
            [
                'headers' => $headers,
                'http_errors' => false
            ]
        );

        if ($result->getStatusCode() == 200) {
            return json_decode(
                $result->getBody()->getContents(),
                $assoc = true,
                $depth = 512
            );
        }

        if ($result->getStatusCode() == 405) {
            throw new BadRequestException(
                sprintf('There is no response for code: %s', $unique_code)
            );
        }

        $result_content_array = \GuzzleHttp\json_decode($result->getBody()->getContents(), true);

        if ($result->getStatusCode() == 400) {
            throw new BadRequestException($result_content_array);
        }

        if ($result->getStatusCode() == 404) {
            throw new NotFoundException($result_content_array);
        }

        if ($result->getStatusCode() == 500) {
            throw new SpeedServerException($result_content_array);
        }

        throw new Exception($result_content_array);

    }


    /**
     * @param array $data
     * @return mixed
     * @throws BadRequestException
     * @throws GuzzleException
     * @throws SpeedServerException
     * @throws UnauthorizedException
     */
    public function registerOrder(array $data)
    {
        $headers = [
            'Authorization' => "Bearer {$this->authorization_token}",
            'Content-Type' => 'application/json'
        ];

        $result = $this->http_client->request(
            'post',
            '/userapi/orders',
            [
                RequestOptions::HEADERS => $headers,
                'http_errors' => false,
                RequestOptions::JSON => $data
            ]
            );

        $result_content_array = \GuzzleHttp\json_decode($result->getBody()->getContents(), true);

        if ($result->getStatusCode() == 401) {
            throw new UnauthorizedException($result_content_array['Message']);
        }

        if ($result->getStatusCode() == 400) {
            throw new BadRequestException(
                sprintf(
                'Error message is: %s, and parameters of error are %s', $result_content_array['message'], $result_content_array['parameters'][0] ?? ''
            ));
        }

        if ($result->getStatusCode() == 500) {
            throw new SpeedServerException($result_content_array);
        }

        return $result_content_array;
    }

}

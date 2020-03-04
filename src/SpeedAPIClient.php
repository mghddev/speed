<?php
namespace mghddev\speed;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use mghddev\speed\Exception\BadRequestException;
use mghddev\speed\Exception\NotFoundException;
use mghddev\speed\Exception\SpeedServerException;
use mghddev\speed\Exception\UnauthorizedException;
use mghddev\speed\ValueObjects\RegisterOrderVO;

/**
 * Class SpeedGuzzleAPIClient
 * @package mghddev\speed
 */
class SpeedAPIClient implements iSpeedGuzzleAPIClient
{

    /**
     * @var string
     */
    protected $default_config = ['base_uri' => 'http://userapi.speedapp.co'];

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
     * @throws UnauthorizedException
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

        if ($result->getStatusCode() == 401) {
            throw new UnauthorizedException('Token is expired');
        }

        if ($result->getStatusCode() == 404) {
            throw new NotFoundException($result_content_array);
        }

        if ($result->getStatusCode() == 500) {
            throw new SpeedServerException($result_content_array);
        }

        throw new Exception($result->getBody()->getContents());

    }


    /**
     * @param RegisterOrderVO $register_order_VO
     * @return mixed
     * @throws BadRequestException
     * @throws GuzzleException
     * @throws SpeedServerException
     * @throws UnauthorizedException
     */
    public function registerOrder(RegisterOrderVO $register_order_VO)
    {
        $data = [
            "code" => $register_order_VO->getCode(),
            "nationalId" => $register_order_VO->getNationalCode(),
            "fullName" => $register_order_VO->getFullName(),
            "company" => $register_order_VO->getCompany(),
            "phone" => $register_order_VO->getPhone(),
            "mobile" => $register_order_VO->getMobile(),
            "description" => $register_order_VO->getDescription(),
            "shift" => $register_order_VO->getShift(),
            "cod" => $register_order_VO->getCostOfDestination(),
            "hasReturn" => $register_order_VO->getHasReturn(),
            "returnDetails" => $register_order_VO->getReturnDetails(),
            "deliveryDate" => $register_order_VO->getDeliveryDate()->format('Y-m-d'),
            "location" => [
                "postalCode" => $register_order_VO->getLocation()->getPostalCode(),
                "address" => $register_order_VO->getLocation()->getAddress(),
                "region" => $register_order_VO->getLocation()->getRegion(),
                "district" => $register_order_VO->getLocation()->getDistrict(),
//                "latitude" => $register_order_VO->getLocation()->getLatitude(),
//                "longitude" => $register_order_VO->getLocation()->getLongitude()
            ]
        ];

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

<?php
namespace mghddev\speed;

/**
 * Interface iSpeedGuzzleAPIClient
 * @package mghddev\speed
 */
interface iSpeedGuzzleAPIClient
{

    public function getOrder(string $unique_code);

    public function registerOrder(array $data);

}

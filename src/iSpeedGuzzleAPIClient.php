<?php
namespace mghddev\speed;

use mghddev\speed\ValueObjects\RegisterOrderVO;

/**
 * Interface iSpeedGuzzleAPIClient
 * @package mghddev\speed
 */
interface iSpeedGuzzleAPIClient
{

    public function getOrder(string $unique_code);

    public function registerOrder(RegisterOrderVO $data);

}

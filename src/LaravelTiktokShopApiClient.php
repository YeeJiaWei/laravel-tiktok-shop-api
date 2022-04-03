<?php


namespace Yeejiawei\LaravelTiktokShopApi;

use Yeejiawei\TiktokShopApi\Client;

/**
 * Class LaravelTiktokShopApiClient
 * @package Yeejiawei\LaravelTiktokShopApi
 *
 * @method \Yeejiawei\TiktokShopApi\Nodes\Shop shop()
 * @method \Yeejiawei\TiktokShopApi\Nodes\Product product()
 * @method \Yeejiawei\TiktokShopApi\Nodes\Order order()
 * @method \Yeejiawei\TiktokShopApi\Nodes\Logistics logistics()
 * @method \Yeejiawei\TiktokShopApi\Nodes\Finance finance()
 * @method \Yeejiawei\TiktokShopApi\Nodes\ReverseOrder reverseOrder()
 * @method \Yeejiawei\TiktokShopApi\Nodes\Fulfillment fulfillment()
 */
class LaravelTiktokShopApiClient
{
    private $appKey;

    private $appSecret;

    public function __construct(array $parameters = [])
    {
        $configs = config('services.tiktok_shop');

        if (!$configs)
            throw new \Exception('Please add config for tiktok_shop');

        if (!$configs['key'])
            throw new \Exception('Tiktok shop app key is required');

        $this->appKey = $configs['key'];

        if (!$configs['secret'])
            throw new \Exception('Tiktok shop app secret is required');

        $this->client = new \Yeejiawei\TiktokShopApi\Client(array_merge($parameters, [
            'access_token' => $parameters['access_token'] ?? '',
            'shop_id' => $parameters['shop_id'] ?? '',
            'app_key' => $configs['key'],
            'app_secret' => $configs['secret'],
        ]));
    }


    public function __call(string $name, array $arguments)
    {
        return $this->client->$name(...$arguments);
    }
}

<?php


namespace YeeJiaWei\LaravelTiktokShopApi;


class TiktokShopClient
{
    public function __construct()
    {
        dd(config('services.tiktok_shop'));
    }
}

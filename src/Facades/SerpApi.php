<?php

namespace ZanySoft\LaravelSerpApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @method static \ZanySoft\LaravelSerpApi\Lib\GoogleSearch GoogleSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\BaiduSearch BaiduSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\BingSearch BingSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\EbaySearch EbaySearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\WalmartSearch WalmartSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\YahooSearch YahooSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\YandexSearch YandexSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\YouTubeSearch YouTubeSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\DuckDuckgoSearch DuckDuckgoSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\NaverSearch NaverSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\YelpSearch YelpSearch($api_key = null)
 * @method static \ZanySoft\LaravelSerpApi\Lib\SerpApiSearch SerpApiSearch($engine)
 *
 */
class SerpApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-serpapi-search';
    }
}

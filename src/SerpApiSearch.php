<?php

namespace ZanySoft\LaravelSerpApi;

use ZanySoft\LaravelSerpApi\Lib\BaiduSearch;
use ZanySoft\LaravelSerpApi\Lib\BingSearch;
use ZanySoft\LaravelSerpApi\Lib\DuckDuckgoSearch;
use ZanySoft\LaravelSerpApi\Lib\EbaySearch;
use ZanySoft\LaravelSerpApi\Lib\GoogleSearch;
use ZanySoft\LaravelSerpApi\Lib\NaverSearch;
use ZanySoft\LaravelSerpApi\Lib\SerpApiSearch as SerpApi;
use ZanySoft\LaravelSerpApi\Lib\WalmartSearch;
use ZanySoft\LaravelSerpApi\Lib\YahooSearch;
use ZanySoft\LaravelSerpApi\Lib\YandexSearch;
use ZanySoft\LaravelSerpApi\Lib\YelpSearch;
use ZanySoft\LaravelSerpApi\Lib\YouTubeSearch;

class SerpApiSearch
{

    protected $api_key = null;

    protected $engine = null;

    public function __construct($api_key, $engine = null)
    {
        $this->api_key = $api_key;
        $this->engine = $engine;
    }

    /**
     * @return GoogleSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function GoogleSearch($api_key = null)
    {
        return new GoogleSearch($api_key ?: $this->api_key);
    }

    /**
     * @return BaiduSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function BaiduSearch($api_key = null)
    {
        return new BaiduSearch($api_key ?: $this->api_key);
    }

    /**
     * @return BingSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function BingSearch($api_key = null)
    {
        return new BingSearch($api_key ?: $this->api_key);
    }

    /**
     * @return EbaySearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function EbaySearch($api_key = null)
    {
        return new EbaySearch($api_key ?: $this->api_key);
    }

    /**
     * @return WalmartSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function WalmartSearch($api_key = null)
    {
        return new WalmartSearch($api_key ?: $this->api_key);
    }

    /**
     * @return YahooSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function YahooSearch($api_key = null)
    {
        return new YahooSearch($api_key ?: $this->api_key);
    }

    /**
     * @return YandexSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function YandexSearch($api_key = null)
    {
        return new YandexSearch($api_key ?: $this->api_key);
    }

    /**
     * @return YouTubeSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function YouTubeSearch($api_key = null)
    {
        return new YouTubeSearch($api_key ?: $this->api_key);
    }

    /**
     * @return DuckDuckgoSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function DuckDuckgoSearch($api_key = null)
    {
        return new DuckDuckgoSearch($api_key ?: $this->api_key);
    }

    /**
     * @return NaverSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function NaverSearch($api_key = null)
    {
        return new NaverSearch($api_key ?: $this->api_key);
    }

    /**
     * @return YelpSearch
     * @throws Exceptions\SerpApiSearchException
     */
    public function YelpSearch($api_key = null)
    {
        return new YelpSearch($api_key ?: $this->api_key);
    }

    /**
     * @param $engine
     * @return SerpApi
     * @throws Exceptions\SerpApiSearchException
     */
    public function SerpApiSearch($engine = null)
    {
        if (!$engine) {
            $engine = $this->engine;
        }
        return new SerpApi($this->api_key, $engine);
    }
}

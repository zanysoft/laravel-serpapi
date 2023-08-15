<?php

namespace ZanySoft\LaravelSerpApi\Lib;

/**
 * Google Search
 */
class GoogleSearch extends SerpApiSearch
{
    /**
     * @param $api_key
     * @throws \ZanySoft\LaravelSerpApi\Exceptions\SerpApiSearchException
     */
    public function __construct($api_key)
    {
        parent::__construct($api_key, 'google');
    }
}

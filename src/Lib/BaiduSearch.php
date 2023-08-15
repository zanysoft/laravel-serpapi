<?php

namespace ZanySoft\LaravelSerpApi\Lib;

use ZanySoft\LaravelSerpApi\Exceptions\SerpApiSearchException;

/**
 * Baidu search
 */
class BaiduSearch extends SerpApiSearch
{
    public function __construct($api_key = null)
    {
        parent::__construct($api_key, 'baidu');
    }

    /**
     * Method is not supported.
     * @param $q
     * @param $limit
     * @return mixed
     * @throws SerpApiSearchException
     */
    public function get_location($q, $limit)
    {
        throw new SerpApiSearchException("location is not currently supported by Baidu");
    }
}

<?php

namespace ZanySoft\LaravelSerpApi\Lib;

use ZanySoft\LaravelSerpApi\Exceptions\SerpApiSearchException;

/**
 * YouTube search
 */
class NaverSearch extends SerpApiSearch
{
    public function __construct($api_key = null)
    {
        parent::__construct($api_key, 'naver');
    }

    /*     * *
     * Method is not supported.
     */

    public function get_location($q, $limit)
    {
        throw new SerpApiSearchException("location is not currently supported by Naver");
    }
}

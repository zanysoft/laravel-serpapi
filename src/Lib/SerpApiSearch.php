<?php

declare(strict_types=1);

namespace ZanySoft\LaravelSerpApi\Lib;

use RestClient;
use ZanySoft\LaravelSerpApi\Exceptions\SerpApiSearchException;

/**
 * Wrapper around serpapi.com
 */
class SerpApiSearch
{
    protected $options;
    protected $api;
    protected $api_key;
    protected $engine;

    /**
     * @param $api_key
     * @param $engine
     * @throws SerpApiSearchException
     */
    public function __construct($api_key = null, $engine = 'google')
    {
        // register engine
        if ($engine) {
            $this->engine = $engine;
        } else {
            throw new SerpApiSearchException("engine must be defined");
        }

        // register private api key
        if ($api_key) {
            $this->api_key = $api_key;
        }
    }

    /**
     * set serpapi key
     *
     * @param $api_key
     * @return void
     * @throws SerpApiSearchException
     */
    public function set_serp_api_key($api_key)
    {
        if ($api_key == null) {
            throw new SerpApiSearchException("serp_api_key must have a value");
        }
        $this->api_key = $api_key;
    }

    /**
     * get json search result
     *
     * @param array $query
     * @return mixed
     */
    public function get_json(array $query)
    {
        return $this->search('json', $query);
    }

    /**
     * get raw html search result
     *
     * @param array $query
     * @return mixed
     * @throws SerpApiSearchException
     */
    public function get_html(array $query)
    {
        return $this->search('html', $query);
    }

    /**
     * Get location using Location API
     * @param $query
     * @param $limit
     * @return mixed
     * @throws SerpApiSearchException
     */
    public function get_location($query, $limit)
    {
        return $this->query("/locations.json", 'json', [
            'q' => $query,
            'limit' => $limit,
        ]);
    }

    /**
     * Retrieve search result from the Search Archive API
     *
     * @param $search_id
     * @return mixed
     * @throws SerpApiSearchException
     */
    public function get_search_archive($search_id)
    {
        return $this->query("/searches/$search_id.json", 'json', []);
    }

    /**
     * Get account information using Account API
     *
     * @return mixed
     * @throws SerpApiSearchException
     */
    public function get_account()
    {
        return $this->query('/account', 'json', []);
    }

    /**
     * Run a search
     *
     * @param string $output
     * @param array $query
     * @return mixed
     * @throws SerpApiSearchException
     * @throws \RestClientException
     */
    protected function search(string $output, array $query)
    {
        return $this->query('/search', $output, $query);
    }

    /**
     * @param $path
     * @param $output
     * @param $query
     * @return mixed
     * @throws SerpApiSearchException
     * @throws \RestClientException
     */
    protected function query(string $path, string $output, array $query)
    {
        $decode_format = $output == 'json' ? 'json' : 'php';

        if ($this->api_key == null) {
            throw new SerpApiSearchException("serp_api_key must be defined either in the constructor or by the method set_serp_api_key");
        }

        $api = new RestClient([
            'base_url' => "https://serpapi.com",
            'user_agent' => 'google-search-results-php/1.3.0',
            'curl_options' => [
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
            ]
        ]);

        $default_q = [
            'output' => $output,
            'source' => 'php',
            'api_key' => $this->api_key,
            'engine' => $this->engine,
        ];
        $query = array_merge($default_q, $query);
        $result = $api->get($path, $query);

        // GET https://serpapi.com/search?q=Coffee&location=Portland&format=json&source=php&engine=google&serp_api_key=demo
        if ($result->info->http_code == 200) {
            // html response
            if ($decode_format == 'php') {
                return $result->response;
            }
            // json response
            return $result->decode_response();
        }

        if ($result->info->http_code == 400 && $output == 'json') {
            $error = $result->decode_response();
            $msg = $error->error;

            throw new SerpApiSearchException($msg);
        }

        throw new SerpApiSearchException("Unexpected exception: $result->response");
    }
}

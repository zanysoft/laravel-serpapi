# laravel-serpapi
Get Google, Bing, Baidu, Ebay, Yahoo, Yandex, Home depot, Naver, Apple, Duckduckgo, Youtube search results via SerpApi.com

[![Latest Stable Version](https://poser.pugx.org/zanysoft/laravel-serpapi/v/stable?format=flat-square)](https://packagist.org/packages/zanysoft/laravel-serpapi)
[![MIT License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](http://www.opensource.org/licenses/MIT)
[![Build Status](http://img.shields.io/travis/zanysoft/laravel-serpapi.svg?style=flat-square)](https://travis-ci.org/zanysoft/laravel-serpapi)
[![Quality Score](http://img.shields.io/scrutinizer/g/zanysoft/laravel-serpapi/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/zanysoft/laravel-serpapi/)
[![Total Downloads](https://img.shields.io/packagist/dt/zanysoft/laravel-serpapi.svg?style=flat-square)](https://packagist.org/packages/zanysoft/laravel-serpapi)

This is where your description should go.

### Installation

You can install the package via composer:

```bash
composer require zanysoft/laravel-serpapi
```

### Configuration
You can publish the config file with:
```bash
php artisan vendor:publish --provider="ZanySoft\LaravelSerpApi\SerpApiServiceProvider" --tag="serpapi-config"
```

This is the contents of the published config file:

```php
return [
    'api_key' => env('SERPAPI_API_KEY'),
    'search_engine' => env('SERPAPI_ENGINE', 'google')
];
```
Get "your api key" from https://serpapi.com/dashboard

### Usage

Then you can start coding something like:
```php
use ZanySoft\LaravelSerpApi\Facades\SerpApi;

$client = SerpApi::GoogleSearch();
$query = ["q" => "coffee","location"=>"Austin,Texas"];
$response = $client->get_json($query);
print_r($response)
 ```
Alternatively, you can search:
- Bing using `SerpApi::BingSearch()`
- Baidu using `SerpApi::BaiduSearch()`
- Ebay using `SerpApi::EbaySearch()`
- Yahoo using `SerpApi::YahooSearch()`
- Yandex using `SerpApi::YandexSearch()`
- Walmart using `SerpApi::WalmartSearch()`
- Youtube using `SerpApi::YoutubeSearch()`
- HomeDepot using `SerpApi::Search($engine)`
- Apple App Store using `SerpApi::Search($engine)`
- Naver using `SerpApi::NaverSearch()`

See the playground to generate your code.
https://serpapi.com/playground

### Examples
#### Search API capability
```php
use ZanySoft\LaravelSerpApi\Facades\SerpApi;

$client = SerpApi::GoogleSearch();

$query = [
  "q" =>  "query",
  "google_domain" =>  "Google Domain", 
  "location" =>  "Location Requested", 
  "device" =>  "device",
  "hl" =>  "Google UI Language",
  "gl" =>  "Google Country",
  "safe" =>  "Safe Search Flag",
  "num" =>  "Number of Results",
  "start" =>  "Pagination Offset",
  "serp_api_key" =>  "Your SERP API Key",
  "tbm" => "nws|isch|shop"
  "tbs" => "custom to be search criteria"
  "async" => true|false # allow async 
];

$html_results = $client->get_html($query);
$json_results = $client->get_json($query);
```

#### Location API

```php
use ZanySoft\LaravelSerpApi\Facades\SerpApi;

$client = SerpApi::GoogleSearch();

$location_list = $client->get_location('Austin', 3);
print_r($location_list);
```
it prints the first 3 location matching Austin (Texas, Texas, Rochester)
```php
[{:id=>"585069bdee19ad271e9bc072",
  :google_id=>200635,
  :google_parent_id=>21176,
  :name=>"Austin, TX",
  :canonical_name=>"Austin,TX,Texas,United States",
  :country_code=>"US",
  :target_type=>"DMA Region",
  :reach=>5560000,
  :gps=>[-97.7430608, 30.267153],
  :keys=>["austin", "tx", "texas", "united", "states"]},
  ...]
```

#### Account API
```php
use ZanySoft\LaravelSerpApi\Facades\SerpApi;

$client = SerpApi::GoogleSearch();

$info = $client->get_account();
print_r($info);
```
it prints your account information.

#### Search Google Images

```php
use ZanySoft\LaravelSerpApi\Facades\SerpApi;

$client = SerpApi::GoogleSearch();
$data = $client->get_json([
  'q' => "Coffee", 
  'tbm' => 'isch'
]);

foreach($data->images_results as $image_result) {
  print_r($image_result->original);
}
```
this code prints all the images links

## Conclusion

SerpApi supports all the major search engines. Google has the more advance support with all the major services available: Images, News, Shopping and more.. To enable a type of search, the field tbm (to be matched) must be set to:

- isch: Google Images API.
- nws: Google News API.
- shop: Google Shopping API.
- any other Google service should work out of the box.
- (no tbm parameter): regular Google search.
  The field tbs allows to customize the search even more.

[The full documentation is available here.](https://serpapi.com/search-api)

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

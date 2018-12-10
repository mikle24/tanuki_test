<?php

namespace Tanuki\utilities;

use Tanuki\interfaces\IApi;
use Tanuki\domain\Currency;

class SimpleAPI implements IApi
{
    public function request(Currency $currency)
    {
        $result = rand(0, 1) ? (float) rand(6000, 7000) / 100 : false;
        echo $result ? 'API request for: ' . $currency->name() . ' is ' . $result . PHP_EOL : 'API error' . PHP_EOL;
        return $result;
    }
}
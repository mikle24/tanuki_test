<?php

namespace Tanuki\dataproviders;

use Tanuki\interfaces\IApi;
use Tanuki\domain\Currency;

/** @property IApi $api */
class APIDataProvider
{
    private $api;

    public function __construct(IApi $api)
    {
        $this->api = $api;
    }

    public function request(Currency $currency)
    {
        return $this->api->request($currency);
    }
}
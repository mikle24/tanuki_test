<?php
namespace Tanuki\controllers;

use Tanuki\domain\Currency;
use Tanuki\utilities\SimpleAPI;
use Tanuki\utilities\SimpleCache;
use Tanuki\utilities\SimpleDB;

class ActionController
{
    public function run()
    {
        echo PHP_EOL . 'Request for USD:' . PHP_EOL;
        (new Currency(CURRENCY::USD, new SimpleCache(), new SimpleDB(), new SimpleAPI()))->get();
        echo PHP_EOL . 'Request for EURO:' . PHP_EOL;
        (new Currency(CURRENCY::EURO, new SimpleCache(), new SimpleDB(), new SimpleAPI()))->get();
        echo PHP_EOL . 'The end!' . PHP_EOL;
    }
}
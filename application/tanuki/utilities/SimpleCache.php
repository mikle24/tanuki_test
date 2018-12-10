<?php

namespace Tanuki\utilities;

use Tanuki\interfaces\ICache;
use Tanuki\domain\Currency;
use \DateTime;

class SimpleCache implements ICache
{
    public function read(Currency $currency, DateTime $date): float
    {
        $result = rand(0, 1) ? (float) rand(5000, 6000) / 100 : false;
        echo $result ? 'Result from cache: ' . $result . ' per ' . $currency->name() . PHP_EOL : 'Record from cache not found' . PHP_EOL;
        return $result;
    }

    public function write(Currency $currency, DateTime $date, float $value): bool
    {
        echo 'Write in cache: ' . $currency->name() . ' on ' . $date->format('d.m.Y h:i:S') . ' is ' . $value . PHP_EOL;
        return true;
    }

}
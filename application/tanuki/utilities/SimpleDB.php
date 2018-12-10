<?php

namespace Tanuki\utilities;

use Tanuki\interfaces\IDataBase;
use Tanuki\domain\Currency;
use \DateTime;

class SimpleDB implements IDataBase
{
    public function read(Currency $currency, DateTime $date): float
    {
        $result = rand(0, 1) ? (float) rand(6000, 7000) / 100 : false;
        echo $result ? 'Result from database: ' . $result . ' per ' . $currency->name() . PHP_EOL : 'Record from database not found' . PHP_EOL;
        return $result;
    }

    public function write(Currency $currency, DateTime $date, float $value): bool
    {
        echo 'Write in database: ' . $currency->name() . ' on ' . $date->format('d.m.Y h:i:S') . ' is ' . $value . PHP_EOL;
        return true;
    }

}
<?php

namespace Tanuki\interfaces;

use Tanuki\domain\Currency;
use DateTime;

interface ICache
{
    public function read(Currency $currency, DateTime $date) : float;
    public function write(Currency $currency, DateTime $date, float $value) : bool;
}
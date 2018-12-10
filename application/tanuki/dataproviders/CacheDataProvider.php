<?php
namespace Tanuki\dataproviders;

use Tanuki\interfaces\ICache;
use Tanuki\domain\Currency;
use DateTime;

/** @property ICache $cache */
class CacheDataProvider
{
    private $cache;

    public function __construct(ICache $cache)
    {
        $this->cache = $cache;
    }

    public function readCurrency(Currency $currency, DateTime $date)
    {
        return $this->cache->read($currency, $date);
    }

    public function writeCurrency(Currency $currency, float $value)
    {
        return $this->cache->write($currency, new DateTime('now'), $value);
    }
}
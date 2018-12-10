<?php
namespace Tanuki\dataproviders;

use Tanuki\interfaces\IDataBase;
use Tanuki\domain\Currency;
use DateTime;

/** @property IDataBase $db */
class DBDataProvider
{
    private $db;

    public function __construct(IDataBase $db)
    {
        $this->db = $db;
    }

    public function readCurrency(Currency $currency, DateTime $date)
    {
        return $this->db->read($currency, $date);
    }

    public function writeCurrency(Currency $currency, float $value)
    {
        return $this->db->write($currency, new DateTime('now'), $value);
    }
}
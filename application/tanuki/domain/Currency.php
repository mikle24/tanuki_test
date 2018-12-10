<?php
namespace Tanuki\domain;

use Tanuki\dataproviders\APIDataProvider;
use Tanuki\dataproviders\CacheDataProvider;
use Tanuki\dataproviders\DBDataProvider;
use Tanuki\interfaces\IApi;
use Tanuki\interfaces\ICache;
use Tanuki\interfaces\IDataBase;
use \DateTime;

/** @property string $type
 *  @property CacheDataProvider $cacheDP
 *  @property DBDataProvider $dbDP
 *  @property APIDataProvider $apiDP
 */
class Currency
{
    const USD = 'usd';
    const EURO = 'euro';

    private $types_names = [
        self::EURO => 'euro',
        self::USD => 'dollar',
    ];

    private $type;
    private $cacheDP;
    private $dbDP;
    private $apiDP;

    /**
     * Currency constructor.
     * @param String $type
     * @param ICache $cache
     * @param IDataBase $db
     * @param IApi $api
     */
    public function __construct(String $type, ICache $cache, IDataBase $db, IApi $api)
    {
        if (in_array($type, array_keys($this->types_names)))
        {
            $this->type = $type;
            $this->cacheDP = new CacheDataProvider($cache);
            $this->dbDP = new DBDataProvider($db);
            $this->apiDP = new APIDataProvider($api);
            return true;
        }
        else
            return false;
    }

    /**
     * Method to get currency data with optional param $date_param
     *
     * @param DateTime|null $date_param
     * @return bool|float
     */
    public function get(DateTime $date_param = null)
    {
        $date = $date_param ? : new DateTime('now');
        if ($result = $this->cacheDP->readCurrency($this, $date))
            return $result;

        if ($result = $this->dbDP->readCurrency($this, $date))
        {
            $this->cacheDP->writeCurrency($this, $result);
            return $result;
        }

        if ($result = $this->apiDP->request($this))
        {
            $this->cacheDP->writeCurrency($this, $result);
            $this->dbDP->writeCurrency($this, $result);
            return $result;
        }

        echo 'Error in all requests' . PHP_EOL;

        return false;
    }

    /**
     * Get text name for this currency
     *
     * @return string
     */
    public function name()
    {
        return $this->types_names[$this->type];
    }
}
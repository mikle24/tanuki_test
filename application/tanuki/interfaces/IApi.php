<?php

namespace Tanuki\interfaces;

use Tanuki\domain\Currency;

interface IApi
{
    public function request(Currency $currency);
}
<?php

namespace App\Services;

use App\Services\Fetch;

class BTCRate
{
    /**
     * Get current BTC to UAH rate
     */
    public static function getRate()
    {
        $btc_info = Fetch::url("https://blockchain.info/tobtc?currency=USD&value=1");

        $usd_info = Fetch::url("https://open.er-api.com/v6/latest/USD");

        $btc_to_usd = 1 / floatval($btc_info);

        $usd_to_uah = json_decode($usd_info)->rates->UAH;

        return $btc_to_usd * $usd_to_uah;
    }
}

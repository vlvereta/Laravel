<?php

namespace App\Services;

class CurrencyGenerator
{
    public static function generate(): array
    {
        return [
            new Currency(
                1,
                'Bitcoin',
                6685.45,
                'https://s2.coinmarketcap.com/static/img/coins/16x16/1.png',
                0.61
            ),
            new Currency(
                2,
                'Ethereum',
                474.82,
                'https://s2.coinmarketcap.com/static/img/coins/16x16/1027.png',
                0.52
            ),
            new Currency(
                3,
                'EOS',
                8.96,
                'https://s2.coinmarketcap.com/static/img/coins/16x16/1765.png',
                -3.08
            ),
            new Currency(
                4,
                'NEO',
                38.42,
                'https://s2.coinmarketcap.com/static/img/coins/32x32/1376.png',
                -8.70
            ),
            new Currency(
            	5,
            	'Dash',
            	238.13,
            	'https://s2.coinmarketcap.com/static/img/coins/16x16/131.pnghttps://s2.coinmarketcap.com/static/img/coins/16x16/131.png',
            	-1.25
            )
        ];
    }
}
<?php

namespace App\Services;

class GetMostChangedCurrencyCommandHandler
{
    private $currencies;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->currencies = $repository->findAll();
    }

    public function handle(): Currency
    {
        $mostChanged = $this->currencies[0];
        foreach ($this->currencies as $currency) {
            if ($mostChanged->getDailyChangePercent() < $currency->getDailyChangePercent())
                $mostChanged = $currency;
        }
        return ($mostChanged);
    }
}

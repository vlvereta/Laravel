<?php

namespace App\Services;

class GetCurrenciesCommandHandler
{
    private $currencies;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->currencies = $repository->findAll();
    }

    public function handle(): array
    {
        return $this->currencies;
    }
}

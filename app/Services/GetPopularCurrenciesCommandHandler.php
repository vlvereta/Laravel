<?php

namespace App\Services;

class GetPopularCurrenciesCommandHandler
{
    const POPULAR_COUNT = 1;

    private $currencies;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->currencies = $repository->findAll();
    }

    public function handle(int $count = self::POPULAR_COUNT): array
    {
        usort($this->currencies, [$this, 'compare']);
        return (array_slice($this->currencies, 0, $count));
    }

    /**
     * Custom compare for usort function.
     * Check getPrice method and return value according to the descending sort.
     *
     * @param Currency $a
     * @param Currency $b
     * @return int
     */
    private function compare(Currency $a, Currency $b) {
        return $b->getPrice() <=> $a->getPrice();
    }
}

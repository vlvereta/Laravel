<?php

namespace App\Http\Controllers;

use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;
use App\Services\GetCurrenciesCommandHandler;
use App\Services\GetMostChangedCurrencyCommandHandler;

class ApiController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = app()->make(CurrencyRepositoryInterface::class);
    }

    public function showAllCurrencies() {
        $command = new GetCurrenciesCommandHandler($this->repository);
        $currencies = $command->handle();
        $result = array();
        foreach ($currencies as $currency) {
            $result[] = CurrencyPresenter::present($currency);
        }
        return response()->json($result);
    }

    public function showUnstableCurrency() {
        $command = new GetMostChangedCurrencyCommandHandler($this->repository);
        $currency = $command->handle();
        return response()->json(CurrencyPresenter::present($currency));
    }
}

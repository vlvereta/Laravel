<?php

namespace App\Http\Controllers;

use App\Services\CurrencyRepositoryInterface;
use App\Services\GetPopularCurrenciesCommandHandler;

class WebController extends Controller
{
    public function __invoke()
    {
        $repository = app()->make(CurrencyRepositoryInterface::class);
        $command = new GetPopularCurrenciesCommandHandler($repository);
        $array = $command->handle(3);
        return view('popular_currencies', compact('array'));
    }
}

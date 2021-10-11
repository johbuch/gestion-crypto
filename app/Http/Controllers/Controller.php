<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        // call API sur le endpoint Ethereum (détail)
        $callApiEthDetails = Http::get("https://api.coingecko.com/api/v3/coins/ethereum");
        $jsonEthDetails = json_decode($callApiEthDetails->body());
        // prix actuel de ETH à chaque call API
        $priceEth = $jsonEthDetails->market_data->current_price->eur;

        $ethValueForFistPurchased = 2834.29;

        // prix d'achat position 1
        $ethPurchasedValue = 9.92;

        // nombre token position 1
        $tokenNumber = 0.0035;
        // valeur en Euros de nombre de token pour position 1
        $intantTEurValue = round(0.0035 * $priceEth);
        // tx évolution ETH
        $ethEvoRate = round(( ($intantTEurValue - $ethPurchasedValue) / $ethPurchasedValue), 2 );
        // gain/loss position 1
        $gainOrLoss = $intantTEurValue - $ethPurchasedValue;

        if($ethEvoRate > 0) {
            $ethEvoRate = '+' . $ethEvoRate;
        } elseif($ethEvoRate < 0) {
            $ethEvoRate = '-' . $ethEvoRate;
        }

        if($gainOrLoss > 0) {
            $gainOrLoss = '+' . $gainOrLoss;
        } elseif($gainOrLoss < 0) {
            $gainOrLoss = '-' . $gainOrLoss;
        }

        return view('index', compact(
            'priceEth',
            'ethValueForFistPurchased',
            'ethPurchasedValue',
            'tokenNumber',
            'intantTEurValue',
            'ethEvoRate',
            'gainOrLoss'
        ));
    }
}

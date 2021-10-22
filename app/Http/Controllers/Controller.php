<?php

namespace App\Http\Controllers;

use App\Models\eth;
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
        $priceEth = $this->getCurrentEthPrice();
        $ethDataDisplayed = $this->getEthData($priceEth);

        // on déclare une variable pour calculer le total profit ou perte eth
        $totalGainOrLossEth = 0;
        foreach ($ethDataDisplayed as $eth) {
            // on incrémente pour avoir le total (gain perte en €) à la fin du foreach
            $totalGainOrLossEth += $eth['gain_loss'];
        }
        return view('index', compact('ethDataDisplayed','priceEth', 'totalGainOrLossEth'));

    }

    /**
     * récupère le prix en cours de l'ETH
     * @return mixed
     */
    private function getCurrentEthPrice()
    {
        // call API sur le endpoint Ethereum (détail)
        $callApiEthDetails = Http::get("https://api.coingecko.com/api/v3/coins/ethereum");
        $jsonEthDetails = json_decode($callApiEthDetails->body());
        // prix actuel de ETH à chaque call API
        return $jsonEthDetails->market_data->current_price->eur;
    }

    /**
     * on récupère les données de la table ETH on boucle sur les positions
     * @param $priceEth
     * @return array
     */
    private function getEthData($priceEth): array
    {
        // on initialise le tableau des données qui sera affichées
        $ethDataDisplayed = [];
        $ethData = Eth::all();
        $totalGainOrLoss = 0;
        foreach($ethData as $position) {
            $ethDataDisplayed[$position->id]['date_achat'] = date('d/m/Y', strtotime($position->purchase_date));
            $ethDataDisplayed[$position->id]['prix_achat'] = $position->purchase_price;
            $ethDataDisplayed[$position->id]['valeur_eth_achat'] = $position->purchase_value;
            $ethDataDisplayed[$position->id]['nombre_jeton'] = $position->token_number;
            // valeur actuelle en euros de la position
            $currentEurValue = round($position->token_number * $priceEth, 2);
            $ethDataDisplayed[$position->id]['instantT_Eur_valeur'] = $currentEurValue;

            // tx évolution ETH
            $ethEvoRate = round(( ($currentEurValue - $position->purchase_price) / $position->purchase_price), 2 );
            // on ajoute le signe + ou -
            if($ethEvoRate > 0) {
                $ethEvoRate = '+' . $ethEvoRate;
            }
            $ethDataDisplayed[$position->id]['taux_evo'] = $ethEvoRate;

            $gainOrLoss = $currentEurValue - $position->purchase_price;
            // on ajoute le signe + ou -
            if($gainOrLoss > 0) {
                $gainOrLoss = '+' . $gainOrLoss;
            }
            $ethDataDisplayed[$position->id]['gain_loss'] = $gainOrLoss;
            $totalGainOrLoss += $gainOrLoss;
        }

        return $ethDataDisplayed;
    }
}

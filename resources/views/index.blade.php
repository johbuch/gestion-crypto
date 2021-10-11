@include('layout._head')
    <div>
        <h1>Stat de suivi ETH</h1>
        <table class="table table-responsive table-hover">
            <thead class="table-head">
                <tr>
                    <th scope="col">ETH</th>
                    <th scope="col">Prix d'achat</th>
                    <th scope="col">Valeur ETH lors de l'Achat</th>
                    <th scope="col">Nombre jetons</th>
                    <th scope="col">Valeur ETH instant T</th>
                    <th scope="col">Valeur en Euros instant T position</th>
                    <th scope="col">Tx évolution valeur ETH en € (%)</th>
                    <th scope="col">Gain - Loss</th>
                </tr>
            </thead>
            <tbody class="table-body">
                @foreach($ethDataDisplayed as $position)
                    <tr class="text-center">
                        <td>{{ $position['date_achat'] }}</td>
                        <td>{{ $position['prix_achat'] }}</td>
                        <td>{{ $position['valeur_eth_achat'] }}€</td>
                        <td>{{ $position['nombre_jeton'] }}</td>
                        <td>{{ $priceEth  }}</td>
                        <td><strong>{{ $position['instantT_Eur_valeur'] }}€</strong></td>
                        <td>
                            @if(str_contains($position['taux_evo'], '+'))
                                <span class="text-success">{{ $position['taux_evo'] }}</span>
                            @else
                                <span class="text-danger">{{ $position['taux_evo'] }}</span>
                            @endif
                        </td>
                        <td>
                            @if(str_contains($position['gain_loss'], "+"))
                                <span class="text-success">{{ $position['gain_loss'] }} €</span>
                            @else
                                <span class="text-danger">{{ $position['gain_loss'] }} €</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('layout._footer')

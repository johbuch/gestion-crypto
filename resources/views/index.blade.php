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
                <tr>
                    <td>18/05/2021</td>
                    <td>{{ $ethPurchasedValue }}</td>
                    <td>{{ $ethValueForFistPurchased }}€</td>
                    <td>{{ $tokenNumber }}</td>
                    <td>{{ $priceEth  }}</td>
                    <td>{{ $intantTEurValue }}</td>
                    <td>{{ $ethEvoRate }}</td>
                    <td><span class="text-success">{{ $gainOrLoss }} €</span></td>
                </tr>
            </tbody>
        </table>
    </div>
@include('layout._footer')

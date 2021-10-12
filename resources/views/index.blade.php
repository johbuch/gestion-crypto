@include('layout._head')
    <div>
        <div class="card card-eth table-responsive">
            <h4 class="card-title">ETH</h4>
            <table class="table table-responsive table-hover">
                <tr>
                    <th>date</th>
                    @foreach($ethDataDisplayed as $position)
                        <td>{{ $position['date_achat'] }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Prix achat</th>
                    @foreach($ethDataDisplayed as $position)
                        <td>{{ $position['prix_achat'] }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Valeur ETH lors de l'Achat</th>
                    @foreach($ethDataDisplayed as $position)
                        <td>{{ $position['valeur_eth_achat'] }}€</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Nombre jetons</th>
                    @foreach($ethDataDisplayed as $position)
                        <td>{{ $position['nombre_jeton'] }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Valeur ETH instant T</th>
                    @foreach($ethDataDisplayed as $position)
                        <td>{{ $priceEth  }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Valeur en Euros instant T position</th>
                    @foreach($ethDataDisplayed as $position)
                        <td>{{ $position['instantT_Eur_valeur'] }}€</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Tx évolution valeur ETH en € (%)</th>
                    @foreach($ethDataDisplayed as $position)
                        <td>
                            @if(str_contains($position['taux_evo'], '+'))
                                <span class="text-success">{{ $position['taux_evo'] }}</span>
                            @else
                                <span class="text-danger">{{ $position['taux_evo'] }}</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th>Gain - Loss</th>
                    @foreach($ethDataDisplayed as $position)
                        <td>
                            @if(str_contains($position['gain_loss'], "+"))
                                <span class="text-success">{{ $position['gain_loss'] }} €</span>
                            @else
                                <span class="text-danger">{{ $position['gain_loss'] }} €</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
            </table>
            <div>
                Gain total : 100
            </div>
        <div>
    </div>
@include('layout._footer')

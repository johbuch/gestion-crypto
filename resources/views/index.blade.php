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
                    <td>9,92€</td>
                    <td>2834,29 €</td>
                    <td>0,0035</td>
                    <td>3155</td>
                    <td>11,04 €</td>
                    <td>+ 11,35 %</td>
                    <td><span class="text-success">+ 1,12 €</span></td>
                </tr>
            </tbody>
        </table>
    </div>
@include('layout._footer')

<x-layout>
    <div>
        {{$sale->id}}
        {{$sale->client_id}}
        @foreach($products as $product)
            <p>{{$product->name}}</p>
            <p>{{$product->price}}</p>
        @endforeach
        {{$client->name}}

        <h1>Detalhes da Venda #{{ $sale->id }}</h1>
    
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Valor Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $saleProduct)
                    <tr>
                        <td>fasdfasdf</td>
                        <td>fasdfasdf</td>
                        <td>fasdfasdf</td>
                        <td>fasdfasdf</td>
                        <td>excluir</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end fw-bold">Total:</td>
                    <td>total</td>
                </tr>
            </tfoot>
        </table>
    </div>
</x-layout>
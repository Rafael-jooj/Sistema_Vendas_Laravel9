<x-layout>
    @php
        $editMode = false;
    @endphp
    <div>
        @if(!$editMode)
            <div style="cursor: pointer; width: 100px" onclick="toggleEditMode()">Editar <i class="ion-edit ion-3x"></i></div>
            <span>(Habilitado edição apenas dos pagamentos)</span>
        @endif
        <div class="d-flex justify-content-between align-tems-center">
            <div><h1>Detalhes da Venda #{{ $sale->id }}</h1></div>
            <div style="cursor: pointer" onclick="print()">Imprimir <i class="ion-printer ion-3x"></i></div>
        </div>
        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col mb-3">
                <label>Cliente:</label>
                {{-- <input type="text" name="client_name" class="form-control" aria-label="First name" disabled value="{{$client->name}}"> --}}
                <div style="width: 100%; border: 1px solid; padding: 5px; border-radius: 5px">
                    {{$client->name}}
                </div>
            </div>
            @foreach ($products as $index => $saleProduct)
                <div class="row mb-3">
                    <div class="col">
                        <label>Produto:</label>
                        <input type="text" name="product_name" class="form-control" aria-label="First name" disabled value="{{$products[$index]->name}}">
                    </div>
                    <div class="col">
                        <label>Quantidade:</label>
                        <input type="text" name="product_qnt" class="form-control" aria-label="Last name" disabled value="{{$saleproducts[$index]->quantity}}">
                    </div>
                    <div class="col">
                        <label>Valor Unitário:</label>
                        <input type="text" name="product_price" class="form-control" aria-label="First name" disabled value="{{number_format($saleproducts[$index]->price, 2, '.', '')}}">
                    </div>
                    <div class="col">
                        <label>Subtotal:</label>
                        <input type="text" name="product_subtotal" class="form-control" aria-label="Last name" disabled value="{{number_format($saleproducts[$index]->quantity*$saleproducts[$index]->price, 2, '.', '')}}">
                    </div>
                </div>
                @endforeach
                <div class="col">
                    <label>Valor Total:</label>
                    <input type="text" name="total_price" class="form-control" aria-label="Last name" disabled value="{{number_format($payments->price, 2, '.', '')}}">
                </div>
            
                <h2 class="mt-3">Detalhes de Pagamento</h2>
            <div class="row">
                <div class="col">
                    <label>Forma de pagamento:</label>
                    <div style="width: 200px; border: 1px solid; padding: 5px; border-radius: 5px">
                        {{$payments->type_pay}}
                    </div>
                </div>
                <div class="col">
                    <label>Quantidade de Parcelas:</label>
                    <div style="width: 200px; border: 1px solid; padding: 5px; border-radius: 5px">
                        {{$payments->num_parcelas}}
                    </div>
                </div>
            </div>
            <div>
                @foreach($parcelas as $index => $parcela)
                    <div class="row mb-3 mt-3">
                        <label>Parcela {{$index + 1}}:</label>
                        <div class="col">
                            <label>Data</label>
                            <input type="date"  name="data_parcela[]" class="form-control" disabled value="{{$parcela->data_vencimento}}">
                        </div>
                        <div class="col">
                            <label>Valor R$</label>
                            <input type="text" name="price_parcela[]" class="form-control" disabled value="{{number_format($parcela->price_parcela, 2, '.', '')}}">
                        </div>
                    </div>
                @endforeach
            </div>
            <input class="sale-campo" type="submit" disabled value="Salvar">
        </form>
    </div>

    <script>    
        function toggleEditMode() {
            @php
                $editMode = $editMode;
            @endphp
            enableInputs();
            updateButtonsVisibility();
        }
    
        function enableInputs() {
            const inputs = document.querySelectorAll('input[type="text"], input[type="date"]');
            inputs.forEach(input => {
                input.removeAttribute('disabled');
            });

            const submitButton = document.querySelector('input[type="submit"]');
            submitButton.removeAttribute('disabled'); 
        }
    
        function updateButtonsVisibility() {
            const editButton = document.querySelector('#edit-button');
            const confirmButton = document.querySelector('#confirm-button');
    
            if (editMode) {
                editButton.style.display = 'none';
                confirmButton.style.display = 'block';
            } else {
                editButton.style.display = 'block';
                confirmButton.style.display = 'none';
            }
        }
    
        function saveChanges() {
            // Aqui você pode implementar a lógica para enviar os dados para o controller e atualizar o banco de dados
            // Depois de salvar, você pode redirecionar para a página de visualização da venda ou atualizar a página atual
        }

        // document.querySelector('form').addEventListener('submit', function () {
        //     const inputs = document.querySelectorAll('input[type="text"], input[type="date"]');
        //     inputs.forEach(input => {
        //         input.removeAttribute('disabled');
        //     });
        // });

        // function saveChanges() {
        //     const inputs = document.querySelectorAll('input[type="text"], input[type="date"]');
        //     inputs.forEach(input => {
        //         input.setAttribute('disabled', 'disabled');
        //     });

        //     // Aqui você pode implementar a lógica para enviar os dados para o controller e atualizar o banco de dados
        //     // Depois de salvar, você pode redirecionar para a página de visualização da venda ou atualizar a página atual
        // }


    </script>
    
</x-layout>
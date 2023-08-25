<x-layout>
    <div class="sale-container">
        @if(session('success'))
            <p>{{session('success')}}</p>
        @endif
        <h1>Realizar Venda</h1>
        <form action="/create-sale" method="POST">
            @csrf
            <label>Cliente:</label>
            <input type="number"  class="form-control" name="client_id" id="client_id" placeholder="ID do Cliente"><br><br>

            <label>Produtos:</label>
            <div id="components-container">
                <div class="row mb-4">
                    <div class="col">
                        <input type="number" name="product_id[]" class="form-control" placeholder="Product ID" aria-label="Product ID" >
                    </div>
                    <div class="col">
                        <input type="number" name="quantity[]" class="form-control" placeholder="Quantidade" aria-label="Quantidade" >
                    </div>
                    <div class="col">
                        <input type="number" name="price[]" class="form-control" placeholder="Preço" aria-label="Preço" >
                    </div>
                    <div class="col">
                        <button  class="sale-campo" onclick="removeComponent(this)">Remover</button>
                    </div>
                </div>
            </div>
            <div class="sale-buttons">
                <input class="sale-campo" type="button" onclick="addComponent()" value="Adicionar Produto">
                <button class="sale-campo" type="submit">Finalizar Venda</button>
            </div>
        </form>
    </div>
</x-layout>
<x-layout>
    <h2>Vendas</h2>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Vendas Realizadas</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Nova Venda</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Venda</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <th scope="row">{{$sale->id}}</th>
                            <td>{{$sale->client_id}}</td>
                            <td>
                              <a href="{{route('sales.show', $sale->id)}}">Visualizar</a>
                            </td>
                          </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="sale-container">
            @if(session('success'))
                <p>{{session('success')}}</p>
            @endif
            <h1>Realizar Venda</h1>
            <form action="{{route('sales.store')}}" method="POST">
                @csrf
                <label>Cliente (Opcional):</label>
                <select class="form-select" name="client_id" aria-label="Default select example" style="max-width: 95%">
                  <option selected value={{Null}}>Cliente Balcão</option>
                  @foreach($clients as $client)
                    <option value={{$client->id}}>{{$client->name}}</option>
                  @endforeach
                </select>  <br><br>
                
                <div class="d-flex align-items-center gap-5 mb-3 ">
                  <label>Produtos:</label>
                  <input class="sale-campo" type="button" onclick="addComponent()" value="Adicionar Produto">
                </div>
                <div id="components-container">
                    <div class="row mb-4">
                        <div class="col">
                          <select class="form-select" name="product_id[]" aria-label="Default select example">
                            <option selected disabled>Selecione o produto</option>
                            @foreach($products as $product)
                              <option id="product_option_{{ $product->id }}" value="{{$product->id}}" data-product-name="{{ $product->name }}">{{$product->name}}</option>
                            @endforeach
                          </select>  
                        </div>
                        <div class="col">
                            <input type="number" name="quantity[]" class="form-control" placeholder="Quantidade" aria-label="Quantidade" >
                        </div>
                        <div class="col">
                            <input type="number" name="price[]" class="form-control price" placeholder="Preço" aria-label="Preço" >
                        </div>
                        <div class="col">
                          <button class="btn btn-danger" onclick="removeComponent(this)">Remover</button>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-5">
                  <h2>Pagamento</h2>
                  <div class="col gap-5 d-flex align-items-center">
                    Parcelas:
                    <input type="number" class="form-control w-25" id="quntityParcelas" required>
                    Valor Total:
                    <input type="text" id="total-price" class="form-control w-25" id="totalPay" value="">
                    <input class="sale-campo" type="button" value="Gerar Parcelas" onclick="addParcela()">
                  </div>
                </div>
                <div id="parcela-container">

                </div>
                <div class="sale-buttons">
                    <button class="sale-campo" type="submit">Finalizar Venda</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      
      <script>
        let totalPrice = 0; 

        function addComponent() {
            const products = @json($products);

            const component = `
                <div class="row mb-4">
                    <div class="col">
                        <select class="form-select" name="product_id[]" aria-label="Default select example">
                            <option selected disabled>Selecione o produto</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>  
                    </div>
                    <div class="col">
                        <input type="number" name="quantity[]" class="form-control" placeholder="Quantidade" aria-label="Quantidade">
                    </div>
                    <div class="col">
                        <input type="number" name="price[]" class="form-control price" placeholder="Preço" aria-label="Preço">
                    </div>
                    <div class="col">
                        <button class="btn btn-danger" onclick="removeComponent(this)">Remover</button>
                    </div>
                </div>
            `;

            document.getElementById('components-container').insertAdjacentHTML('beforeend', component);
            updateTotalPrice();
        }

        function removeComponent(button) {
            button.closest('.row').remove();
        }

        function updateTotalPrice() {
          const priceInputs = document.querySelectorAll('.price');

          totalPrice = 0;

          priceInputs.forEach(input => {
              const price = parseFloat(input.value) || 0;
              totalPrice += price;
          });

          console.log(totalPrice)
          document.getElementById('total-price').value = totalPrice.toFixed(2);
      }

      document.addEventListener("DOMContentLoaded", function() {
          const priceInputs = document.querySelectorAll('.price');
          
          priceInputs.forEach(input => {
              input.addEventListener('input', updateTotalPrice);
          });
          
          updateTotalPrice();
      });

    </script>

</x-layout>
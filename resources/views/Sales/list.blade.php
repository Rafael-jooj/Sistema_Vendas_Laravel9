<x-layout>
    <h2>Vendas</h2>
    @include('components/flash-message')
    <div class="tab-content" id="myTabContent">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Vendas Realizadas</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Nova Venda</button>
        </li>
      </ul>
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="mt-3">
              <form action="{{ route('sales.index')}}" method="GET" class="mb-3">
                <label for="client_id">Filtrar por código do Cliente:</label>
                <input type="text" id="client_id" name="client_id" class="form-control" placeholder="Digite o ID do Cliente">
                <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
              </form>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Venda</th>
                    <th scope="col">Código do Cliente</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <th scope="row">{{$sale->id}}</th>
                            <td>{{$sale->client_id}}</td>
                            <td>
                              <div class="row">
                                <div class="col">
                                  <a href="{{route('sales.show', $sale->id)}}"><i class="ion-eye ion-2x text-dark" style="margin-right: 10px; font-size:20px"></i></a>
                                </div>
                                <div class="col">
                                  <form action="{{route('sales.destroy', $sale->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button style="border: none; border-radius:5px; background-color: rgb(231, 193, 88)" type="submit">excluir</button>
                                  </form>
                                </div>
                              </div>
                                
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
                          <select required id="product-select" class="form-select" name="product_id[]" aria-label="Default select example">
                            <option selected disabled>Selecione o produto</option>
                            @foreach($products as $product)
                              <option id="product_option_{{ $product->id }}" value="{{$product->id}}" data-product-name="{{ $product->name }}">{{$product->name}}</option>
                            @endforeach
                          </select>  
                        </div>
                        <div class="col">
                            <input type="number" name="quantity[]" class="form-control qnt_item" placeholder="Quantidade" aria-label="Quantidade"  value="1">
                        </div>
                        <div class="col">
                            <input type="number" name="price[]" class="form-control price" placeholder="Subtotal" aria-label="Preço" value="">
                        </div>
                        <div class="col">
                          <button class="btn btn-danger" onclick="removeComponent(this)">Remover</button>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-5">
                  <h2>Pagamento</h2> <span> (Para pagamento a vista selecione 1 parcela)</span>
                  <div class="col gap-5 d-flex align-items-center">
                    Parcelas:
                    <input type="number" name="quantityParcelas" class="form-control w-25" id="quantityParcelas" required>
                    Valor Total:
                    <input type="text" id="total-price"  name="total-price" class="form-control w-25" value="">
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
                        <input type="number" name="quantity[]" class="form-control qnt_item" placeholder="Quantidade" aria-label="Quantidade"  value="1">
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
            updateTotalPrice();
        }

      //   function updateTotalPrice() {
      //     const priceInputs = document.querySelectorAll('.price');
      //     const qnt_item = parseInt(document.getElementById('qnt_item').value) || 0;

      //     totalPrice = 0;

      //     priceInputs.forEach(input => {
      //         const price = parseFloat(input.value) || 0;
      //         totalPrice += price;
      //     });

      //     const totalPriceWithItems = totalPrice * qnt_item;
      //     // console.log(totalPriceWithParcelas)
      //     document.getElementById('total-price').value = totalPriceWithItems.toFixed(2);
      // }

      function updateTotalPrice() {
        const componentRows = document.querySelectorAll('.row.mb-4');
        const totalPriceInput = document.getElementById('total-price');

        let totalPrice = 0;

        componentRows.forEach(row => {
            const priceInput = row.querySelector('.price');
            const quantityInput = row.querySelector('.qnt_item');

            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseInt(quantityInput.value) || 0;

            totalPrice += price * quantity;
        });

        console.log(totalPrice)

        totalPriceInput.value = totalPrice.toFixed(2);
    }


      // document.addEventListener("DOMContentLoaded", function() {
      //     const priceInputs = document.querySelectorAll('.price');
      //     const quantityInput = document.getElementById('qnt_item');
          
      //     priceInputs.forEach(input => {
      //         input.addEventListener('input', updateTotalPrice);
      //     });

      //     quantityInput.addEventListener('input', updateTotalPrice);
          
      //     updateTotalPrice();
      // });

      document.addEventListener("DOMContentLoaded", function() {
          const componentsContainer = document.getElementById('components-container');

          componentsContainer.addEventListener('input', function(event) {
              if (event.target.classList.contains('price') || event.target.classList.contains('qnt_item')) {
                  updateTotalPrice();
              }
          });

          updateTotalPrice();
      });

    </script>

</x-layout>
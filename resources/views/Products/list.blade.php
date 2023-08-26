<x-layout>
    <h2>Produtos</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Lista de Produtos</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Novo Produto</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Visualizar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                              <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="border: none; border-radius:5px; background-color: rgb(231, 193, 88)" type="submit">excluir</button>
                              </form>
                            </td>
                            <td>
                              <div class="col">
                                <a href="{{route('products.show', $product->id)}}"><i class="ion-eye ion-2x text-dark" style="margin-right: 10px; font-size:20px"></i></a>
                              </div>
                            </td>
                          </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <h1>Criar Produto</h1>        
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Produto</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Preço do Produto</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Criar Produto</button>
            </form>
        
            <a href="" class="btn btn-secondary mt-3">Voltar para a lista de produtos</a>
          </div>
        </div>

</x-layout>
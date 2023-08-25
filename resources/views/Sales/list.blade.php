<x-layout>
    <h2>Vendas</h2>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Vendas Realizadas</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Novo Venda</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <th scope="row">{{$sale->id}}</th>
                            <td>{{$sale->client_id}}</td>
                            <td><a href="">Visualizar</a></td>
                          </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
      </div>

</x-layout>
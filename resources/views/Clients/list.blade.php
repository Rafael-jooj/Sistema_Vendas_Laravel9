<x-layout>
    <h2>Clientes</h2>
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Lista de Clientes</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Novo Cliente</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Visualizar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                      <tr>
                        <th scope="row">{{$client->id}}</th>
                        <td>{{$client->name}}</td>
                        <td>
                          <form action="{{route('clients.destroy', $client->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="border: none; border-radius:5px; background-color: rgb(231, 193, 88)" type="submit">excluir</button>
                          </form>
                        </td>
                        <td>
                          <div class="col">
                            <a href="{{route('clients.show', $client->id)}}"><i class="ion-eye ion-2x text-dark" style="margin-right: 10px; font-size:20px"></i></a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <h1>Cadastrar Cliente</h1>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Cliente</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
            </form>
        
            <a href="" class="btn btn-secondary mt-3">Voltar para a lista de clientes</a>
        </div>
      </div>

</x-layout>
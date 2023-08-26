<x-layout>
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
</x-layout>
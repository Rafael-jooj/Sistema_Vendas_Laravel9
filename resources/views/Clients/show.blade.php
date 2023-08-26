<x-layout>
    <div>
        <div>
            <h1>Informações do cliente</h1>
    
            <form action="{{route('clients.update', $clients->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col mb-3">
                        <label>Nome do cliente:</label>
                        <input type="text" name="name" class="form-control" aria-label="First name" value="{{$clients->name}}">
                    </div>
                </div>
    
                <button class="sale-campo" type="submit">Editar</button>
            </form>
        </div>
    </div>
</x-layout>

<x-layout>
    <div>
        <h1>Informações do Produto #{{$products->id}}</h1>

        <form action="{{route('products.update', $products->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col mb-3">
                    <label>Produto:</label>
                    <input type="text" name="name" class="form-control" aria-label="First name" value="{{$products->name}}">
                </div>
                <div class="col mb-3">
                    <label>Preço:</label>
                    <input type="text" name="price" class="form-control" aria-label="First name" value="{{number_format($products->price, 2, '.', '')}}">
                </div>
            </div>

            <button class="sale-campo" type="submit">Editar</button>
        </form>
    </div>
</x-layout>
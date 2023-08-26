<x-layout>
    {{-- <div class="product-container">
        <div class="product-card">
            <h1>Criar produto</h1>

            <form action="/create-product" method="POST">
                @csrf
                <div class="product-form">
                    <label>Nome</label>
                    <input class="campo" type="text", name="name", id="name", placeholder="Nome do Produto">
                </div>
                <div class="product-form">
                    <label>Preço</label>
                    <input class="campo" type="number", name="price", id="price", placeholder="Preço do Produto"><br><br>
                </div>

                <button class="campo" type="submit">Cadastrar</button>
            </form>
        </div>
    </div> --}}

    <h1>Criar Produto</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
</x-layout>
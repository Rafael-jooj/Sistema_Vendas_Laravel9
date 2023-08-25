<x-layout>
    <div class="product-container">
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
    </div>
</x-layout>
<x-layout>
    <div class="client-container">
        <div class="client-card">
            <h1>Cadastrar cliente</h1>
    
            <form action="/create-client" method="POST">
                @csrf
                <div class="client-form">
                    <label>Nome</label>
                    <input class="campo" type="text", name="name", id="name", placeholder="Nome do Produto"><br><br>
                </div>
    
                <button class="campo" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</x-layout>

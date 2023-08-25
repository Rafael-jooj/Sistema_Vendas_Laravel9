<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div>
        <h1>Criar Venda</h1>
        <form action="/sale" method="POST">
            @csrf
            <label>cliente ID</label>
            <input type="number", name="name", id="name", placeholder="ID do Cliente"><br><br>

            <div id="components-container">
                <div class="row">
                    <div class="col">
                        <input type="number" name="product_id[]" class="form-control" placeholder="Product ID" aria-label="Product ID">
                    </div>
                    <div class="col">
                        <input type="number" name="quantity[]" class="form-control" placeholder="Quantidade" aria-label="Quantidade">
                    </div>
                    <div class="col">
                        <input type="number" name="price[]" class="form-control" placeholder="Preço" aria-label="Preço">
                    </div>
                    <div class="col">
                        <button onclick="removeComponent(this)">Remover</button>
                    </div>
                </div>
            </div>
            <input type="button" onclick="addComponent()" value="Adicionar Componente">
        </form>
    </div>

    <script src="js/logica.js"></script>
</body>
</html>
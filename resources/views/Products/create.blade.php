<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Criar produto</h1>

        <form action="/create-product" method="POST">
            @csrf
            <label>Nome</label>
            <input type="text", name="name", id="name", placeholder="Nome do Produto"><br><br>

            <label>Preço</label>
            <input type="number", name="price", id="price", placeholder="Preço do Produto"><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
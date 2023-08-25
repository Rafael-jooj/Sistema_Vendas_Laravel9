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
    {{-- <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fs-5">
            <div class="container-fluid d-flex justify-content-between gap-lg-0">
              <a class="navbar-brand" href="#">DC Vendas</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Produtos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Vendas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Filtrar Vendas</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header> --}}

    <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline">DC Vendas</span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li>
                          <a href="#" class="nav-link px-0 align-middle text-white fs-5">
                              <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Vendas</span> </a>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-0 align-middle text-white fs-5">
                              <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Produtos</span> </a>
                      </li>
                      <li>
                        <a href="#" class="nav-link px-0 align-middle text-white fs-5">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Clientes</span> </a>
                    </li>
                  </ul>
                  <hr>
                  <div class="dropdown pb-4">
                      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://github.com/Rafael-jooj.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                          <span class="d-none d-sm-inline mx-1">Vendedor</span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                          <li><a class="dropdown-item" href="#">Sign out</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col py-3 px-5">
              {{$slot}}
          </div>
      </div>
    </div>

    <script src="js/logica.js"></script>
</body>
</html>
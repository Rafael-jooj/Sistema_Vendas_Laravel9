<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DC Vendas</title>

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <div class="dropdown pb-4 mb-3 mt-2">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/Rafael-jooj.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Vendedor</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>  
                <a href="{{route('sales.index')}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline">DC Vendas</span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li>
                          <a href="{{route('sales.index')}}" class="nav-link px-0 align-middle text-white fs-5">
                              <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"><i class="ion-ios-cart ion-lg"></i> - Vendas</span> </a>
                      </li>
                      <li>
                          <a href="{{route('products.index')}}" class="nav-link px-0 align-middle text-white fs-5">
                              <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"><i class="ion-ios-albums ion-lg"></i> - Produtos</span> </a>
                      </li>
                      <li>
                        <a href="{{route('clients.index')}}" class="nav-link px-0 align-middle text-white fs-5">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"><i class="ion-ios-person ion-lg"></i> - Clientes</span> </a>
                    </li>
                  </ul>
                  <hr>
                  
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
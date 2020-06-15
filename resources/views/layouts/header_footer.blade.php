<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <title>Document</title>
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
</head>
<body class="d-flex flex-column">
<header><div class="container-fluid bg-dark">
        <div class="row">
    <h1 class="text-white-50 justify-self-start">My Logo</h1>

    </div></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav mr-auto">
                <li class="nav-item @isactive('index') ">
                    <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item @isactive('basket*') ">
                    <a class="nav-link" href="{{route('basket')}}">Basket</a>
                </li>
                <li class="nav-item dropdown @isactive('categor*') ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    @if (!Route::currentRouteNamed('login') && !Route::currentRouteNamed('register'))
                        
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('categories')}}">All categories</a>
                    @foreach($categories as $category)

                        <a class="dropdown-item" href="/{{$category->code}}">{{$category->name}}</a>
                        @endforeach
                    </div>@endif
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">register</a>
                        </li>
                        @endguest
                @auth
                @admin
                    
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        admin
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a  class="dropdown-item @isactive('categories.index') " href="{{route('categories.index')}}">categories</a>
                     <a class="dropdown-item @isactive('home') " href="{{route('home')}}">orders</a>
                     <a class="dropdown-item @isactive('products.index') " href="{{route('products.index')}}">products</a>
                      
                    </div>
                  
                </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('person.orders.index')}}">my orders </a>
                    </li>
                @endadmin       
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('getlogout')}}">logout</a>
                    </li>
                    @endauth
                    
                    
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

        </div>
    </nav>
</header>

@if(session()->has('success'))
    <p class="alert alert-success"> {{session()->get('success')}}</p>
@endif
@if(session()->has('warning'))
<p class="alert alert-warning">{{session()->get('warning')}}</p>
@endif
 @yield('content')
<footer class="container-fluid bg-secondary mt-auto">
    <div  class="d-flex">
        <h1 class="d-block mx-auto">Here's FOOTER</h1>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</footer>
</body>
</html>

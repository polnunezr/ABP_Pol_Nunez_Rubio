<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v6.0.0/js/all.js"
    integrity="sha384-l+HksIGR+lyuyBo1+1zCBSRt6v4yklWu7RbG0Cv+jDLDD9WFcEIwZLHioVB4Wkau" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="icon" href="{{ asset("media/favicon.png") }}">
    <title>@yield("title")</title>
</head>
<body id="body">
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url("/") }}">
                <img src="{{ asset("media/logo.jfif") }}" alt="..." width="184.5px" height="68px" style="margin-right: 20px">
                Aprenentatge Basat en Projectes
            </a>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="true" aria-expanded="false">Dades mestres</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">Cicles</a>
                        <a class="dropdown-item" href="{{ url("/curs") }}">Cursos</a>
                    </div>
                    </li>
                </ul>
            </div>
      </nav>
    <div class="container-fluid">
        @yield("container")
    </div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/7fae944b38.js" crossorigin="anonymous"></script>

<script src="{{ asset("js/javascript.js") }}"></script>
</body>
</html>

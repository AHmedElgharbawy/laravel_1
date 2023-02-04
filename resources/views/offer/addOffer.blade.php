<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route("all")}}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a style="color:white;text-decoration: none"rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="{{__("messages.Search")}}" aria-label="Search">
                    <button class="btn btn-outline-light bg-warning" type="submit">{{__("messages.Search")}}</button>

                </form>
            </div>
        </div>
    </nav>
    <div style="width: 600px;margin: 0 auto;">
        <h2 style="text-align:center;padding: 42px 0;font-size: 80px;font-weight: bold;">{{__("messages.Add your offer")}}</h2>
        <form method="POST" action="{{route("offer.store")}}" class="m-5">
            @csrf
            @if(Session::has("success"))
                <div class="alert alert-success" role="alert">
                    {{Session::get("success")}}
                </div>
            @endif
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="offer name" name="name">
                <label for="floatingInput">{{__("messages.name")}}</label>
                @error("name")
                <small style="color:#f63f3f;font-weight: bold">{{"$message"}}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="offer price" name="price">
                <label for="floatingPassword">{{__("messages.price")}}</label>
                @error("price")
                <small style="color:#f63f3f;font-weight: bold">{{"$message"}}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="offer description" name="description">
                <label for="floatingPassword">{{__("messages.description")}}</label>
                @error("description")
                <small style="color:#f63f3f;font-weight: bold">{{"$message"}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"> {{__("messages.Add")}}</button>

        </form>
    </div>
    </body>
</html>

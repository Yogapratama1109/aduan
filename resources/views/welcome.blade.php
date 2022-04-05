<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wikrama | Ajuan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--Styling LandingPage-->
        <link rel="stylesheet" href="{{ url('/assets/css/app.css') }}">

    </head>
    <body class="antialiased">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">

              <a class="navbar-brand" href="#">
                  <h4 class="text-primary">JabarAjuan</h4>
              </a>

              <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
              </button>


              <div class="navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <div class="menu">
                    <a class="nav-link active"href="{{ url('/') }}">Home</a>
                    @if (Route::has('login'))
                        @auth
                        @else
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>

                        @if (Route::has('register'))
                            {{-- <a href="{{ route('register') }}" class="nav-link">Register</a> --}}
                        @endif
                        @endauth
                    @endif
                  </div>

                  <div class="getStarted">
                      <div class="polygon">
                          <div class="clipath"></div>
                      </div>
                      <div class="buttonWrapper">
                        <a href="{{ url('aduan/') }}" class="nav-link">Ajukan Sekarang</a>
                      </div>
                  </div>

                </div>
              </div>

            </div>
        </nav>
        <!--End Navbar-->

        {{-- Script --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>

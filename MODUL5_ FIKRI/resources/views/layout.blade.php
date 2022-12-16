<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('component/style/style.css') }}">
    <title>Showroom</title>
</head>
<body>
    <!-- Nav -->
  @if(Cookie::get('warna_navbar') == 'blue')
  <nav class="navbar navbar-expand-lg bg-primary">
  @elseif(Cookie::get('warna_navbar') == 'red')
  <nav class="navbar navbar-expand-lg bg-danger">
  @elseif(Cookie::get('warna_navbar') == 'yellow')
  <nav class="navbar navbar-expand-lg bg-warning">
  @else
  <nav class="navbar navbar-expand-lg bg-primary">
  @endif
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link text-white" aria-current="page" href="../">Home</a>
              </li>
              <li class="nav-item">
              @if(Session::get('login') == null)

              @else
              <a class="nav-link text-white" href="{{ ($jmlData > 0) ? '/list-car' : '/add-car' }}">My Car</a>
              @endif
              </li>  
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(Session::get('login') == null)
            <li>
                <a href="/login" class="nav-link text-white">Login</a>
            </li>
            @else
            <li>
              <button class="btn btn-default btn-sm navbar-btn" style="margin-right:15px;background:white"><a href="/add-car" class="text-primary text-decoration-none">Add Car</a></button>
            </li>
            <li class="nav-item dropdown">
              <a class="btn btn-default btn-sm text-primary dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:white">
                {{ Session::get('nama') }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" style="right: 0; left: auto;">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/doLogout">Logout</a></li>
              </ul>
            </li>
            @endif
        </ul>
      </div>
    </div>
  </nav>
  <!-- Nav End -->
@yield('content')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
        $('.toast').toast('show');
    })
</script>
</body>
</html>
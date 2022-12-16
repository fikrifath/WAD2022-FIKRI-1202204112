<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Login</title>
</head>
<style>
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
</style>
<body>

<div class="row">
    <div class="col-6">
        <div class="bg-image" 
        style="background-image: url('{{ asset('component/images/nasi.png') }}');
        height: 100vh;
        background-position: center;
        background-repeat: no-repeat">
        </div>
    </div>
    <div class="col-6 m-auto">
        <div class="container"> 
            <form action="{{ url('doLogin') }}" method="POST">
                @csrf
                <div class="mb-3 row">                   
                    <div class="col-10 m-auto">                    
                    <h2 class="mb-4">Login</h2>
                    @if(session()->has('success'))
                    <p><?php echo showSuccess(Session::get('success')); ?></p>
                    @elseif(session()->has('error'))
                    <p><?php echo showError(Session::get('error')); ?></p>
                    @endif
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="Email" value="{{ (Cookie::get('remember') == 'remembered') ? Cookie::get('email') : '' }}" placeholder="Masukan Email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ (Cookie::get('remember') == 'remembered') ? Cookie::get('password') : '' }}" placeholder="Masukan Password" required>
                    </div>
                </div>
                <div class="mb-3 row form-check">
                    <div class="col-10 m-auto">
                        <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1" {{ (Cookie::get('remember') == 'remembered') ? 'checked' : '' }}>
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 m-auto">
                        <button type="submit" name="login" class="btn btn-primary" style="width:100px">Login</button>
                        <p class="mt-2">
                            Anda Belum Punya Akun? <a href="/register">Daftar</a>
                        </p>
                    </div>                    
                </div>                
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
        $('.toast').toast('show');
    })
</script>
</html>
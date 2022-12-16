<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Register</title>
</head>
<style>
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
</style>
<body>
    <!-- ALERT -->
<?php 
function showError($error)
{   
    ?>
    <div class="toast position-fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="text-danger"><i class="bi bi-square-fill"></i></span>
            <strong class="me-auto">&nbsp;Alert</strong>
            
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $error ?>
        </div>
    </div>
    
<?php
}

function showSuccess($success)
{   
    ?>
    <div class="toast position-fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="text-success"><i class="bi bi-square-fill"></i></span>
            <strong class="me-auto">&nbsp;Alert</strong>
            
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $success ?>
        </div>
    </div>
    
<?php
}
?>
<!-- END OF ALERT -->

<div class="row">
    <div class="col-6">
        <div class="bg-image" 
        style="background-image: url('{{ asset('component/images/masjid.jpg') }} ');
        height: 70vh; width: -1000vh;
        background-position: center;
        background-repeat: no-repeat">
        </div>
    </div>
    <div class="col-6 m-auto">
        <div class="container">
            <form action="{{ url('doRegister') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                    <h2 class="mb-4">Register</h2>
                    @if(session()->has('success'))
                    <p><?php echo showSuccess(Session::get('success')); ?></p>
                    @elseif(session()->has('error'))
                    <p><?php echo showError(Session::get('error')); ?></p>
                    @endif
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="Email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="name" id="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="no_hp">Nomor Handphone<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" maxlength="13" name="no_hp" id="no_hp" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="password">Kata Sandi<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="password">Konfirmasi Kata Sandi<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 m-auto">
                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin membuat akun?')" name="daftar" class="btn btn-primary" style="width:100px">Daftar</button>
                        <p class="mt-2">
                            Anda Sudah Punya Akun? <a href="/login">Login</a>
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
</body>
</html>
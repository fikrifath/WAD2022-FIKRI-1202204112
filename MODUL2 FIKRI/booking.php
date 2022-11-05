<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<title>Car Rental CUTE Cottage Book</title>
<?php 
    $nama = "Fikri_1202204112";
    $Gambar = $_GET['img'];
  
    ?> 

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .bawah {
        text-align: center;
      }
    </style>

<header class="p-3 text-bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>     
               <a href="home.php" class="nav-link px-3 text-white">Home</a>
               <a href="mybooking.php" class="nav-link px-3 text-white">Booking</a>
          </div>
        </div>
      </header>
    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Rent Your Car Now!</h2>
      </div>
      
      <div class="row g-0 text-center">
        <div class="col-sm-6 col-md-8">
          <div class="row g-5">
            <div class="col-md-7 col-lg-8">
              <form class="" action="booking.php" method="GET">
                <div class="row g-3">
                <div class="col-12">
                    <label for="nama" class="form-label">Name</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="<?php echo $nama ?>" disabled readonly>
                </div>

                <div class="col-12">
                <label for="date">Book Date</label>
                <input type="date" id="date" name="date" class="form-control">
                </div>

                <div class="col-12">
                <label for="time">Start Time</label>
                <input type=time class="form-control" id="time" name="time">
                </div>
        
                <div class="col-12">
                    <label for="days" class="form-label">Duration Days</label>
                    <input type="number" class="form-control" id="days" name="days">
                </div>

                  <div class="col-12">
                    <label for="car" class="form-label">Car Type</label>
                    <select class="form-select" id="car" name="car">
                    <option selected>Open this select menu</option>
                    <option value="SUV">Mobil SUV</option>
                    <option value="Xpander">Toyota Xpander</option>
                    <option value="Harbie">Harbie car</option>
                    </select>
                  </div>
        
                  <div class="col-12">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="phonenumber" name="phonenumber">
                </div>
      
        
                <h5 class="mb-3">Add Service</h5>
        
                <div class="my-3">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="hp" id="hp">
                <label class="form-check-label" >Health Protocol / Rp.55.000</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="driver" id="driver">
                <label class="form-check-label" >Driver / Rp.200.000</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="bensin" id="bensin">
                <label class="form-check-label">Fuel filled / Rp.100.000</label>
                </div>
                </div>
        
                </div>
        
                <hr class="my-4">
        
                <button class="w-100 btn btn-success" formaction="mybooking.php" type="submit">Book</button>
              </form>
            </div>
            <div class="col-md-7 col-lg-8">
            
            </div>
          </div>
  </div>
  <div class="col-6 col-md-4">
  <img src="<?php echo $Gambar ?>"class="img-fluid" alt="..."></div>
  
</div>
  </main>

  <footer>
    <div class="card-footer text-muted">
        <p class="bawah"> <?php echo $nama ?></p>
      </div>
</footer>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>

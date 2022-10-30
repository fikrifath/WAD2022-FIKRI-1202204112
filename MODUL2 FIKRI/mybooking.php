<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Car Rental CUTE Cottage Book</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    

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

    
  </head>
  <body>
    

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

<main>
    <?php 
    $nama = "Fikri_1202204112";
    $date = isset($_GET['date']) ? $_GET['date'] : '';
    $time = isset($_GET['time']) ? $_GET['time'] : '';
    $days = isset($_GET['days']) ? $_GET['days'] : '';
    $car = isset($_GET['car']) ? $_GET['car'] : '';
    $phonenumber = isset($_GET['phonenumber']) ? $_GET['phonenumber'] : '';
    $hp = isset($_GET['hp']) ? $_GET['hp'] : '';
    $driver = isset($_GET['driver']) ? $_GET['driver'] : '';
    $bensin = isset($_GET['bensin']) ? $_GET['bensin'] : '';

    $service = $hp or $driver or $bensin;
    ?> 
  <section class="py-5 text-center container">
    <div >
      <div class="col-lg-6 col-md-8 mx-auto">
        <h3 >Thank You <?php echo $nama ?> For Reserving</h3>
        <h5 >Please double check your reservation details</h5>
      </div>
    </div>
  </section>

  <table class="table table-success table-striped">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  <thead>
    <tr>
      <th scope="col">Booking Number</th>
      <th scope="col">Name</th>
      <th scope="col">Check in</th>
      <th scope="col">Check Out</th>
      <th scope="col">Car Type</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Service(s)</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php
echo(rand() . "<br>");?></td>
      <td><?php echo $nama ?></td>
      <td><?php echo $date ?></td>
      <td><?php echo $time ?></td>
      <td><?php echo $car ?></td>
      <td><?php echo $phonenumber ?></td>
      <td><?php echo $service ?></td>
      <td></td>
    </tr>
  </tbody>
    </div>
  </div>
</table>

</main>

<footer>
    <div class="card-footer text-muted">
        <p class="bawah"> <?php echo $nama ?></p>
      </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>

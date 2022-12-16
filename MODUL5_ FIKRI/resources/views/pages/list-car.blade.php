@extends('../layout')
@section('content')
<?php
function showSuccess($success)
{   
    ?>
    <div class="toast position-fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            @if(Session::get('action') == 'save')
            <span class="text-primary"><i class="bi bi-square-fill"></i></span>
            @elseif(Session::get('action') == 'update')
            <span class="text-warning"><i class="bi bi-square-fill"></i></span>
            @elseif(Session::get('action') == 'delete')
            <span class="text-danger"><i class="bi bi-square-fill"></i></span>
            @endif
            <strong class="me-auto">&nbsp;Alert</strong>
            
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $success ?>
        </div>
    </div>
    
<?php
}

function showError($error)
{   
    ?>
    <div class="toast position-fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="text-danger"><i class="bi bi-square-fill"></i></span>
        </div>
        <div class="toast-body">
            <?php echo $error ?>
        </div>
    </div>
    
<?php
}
?>
  <!-- Content -->
  <section id="list">
    <div class="container">
      <div>
      <div class="row">
            <div class="col-4">
            @if(session()->has('success'))
            <p><?php echo showSuccess(Session::get('success')); ?></p>
            @elseif(session()->has('error'))
            <p><?php echo showError(Session::get('error')); ?></p>
            @endif
            </div>
        </div>
        <h1>My Show Room</h1>
        <p>List Mobil Show Room Fikri Fathoni</p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($showroom as $row)
        <div class="col">
          <div class="card h-100" style="width: 18rem;">
            <div class="p-2">
            <img src="{{ asset('uploads/'.$row->foto) }}" class="card-img-top" alt="..." style="height: 200px">
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $row->name }}</h5>
              <p class="card-text">{{ substr($row->description, 0, 50) }}</p>
              <span class="d-flex">
                <a href="{{ url('detail-car', $row->id) }}" class="btn btn-primary" style="border-radius: 100px; width:140px; height: 36px;">Detail</a>
                <form onsubmit="return confirm('Apakah Anda Yakin ?')" action="{{ url('delete-car', $row->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <!-- Button trigger modal -->
                  <button type="submit" class="btn btn-danger" style="border-radius: 100px; width:140px; height: 36px; margin-left:20px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                  </button>
                </form>
              </span>
            </div>
          </div>
        </div>
        @empty
        <div class="alert alert-danger">
            Data mobil belum Tersedia.
        </div>
        @endforelse
        </div>
      </div>
    </div>
  </section>
  <!-- Content End -->

  <!-- footer -->
  <footer class="mt-2">
    <div class="container">
      <p style="font-family: 'Raleway'; font-style: normal; font-weight: 700; font-size: 16px; line-height: 19px; color: #757575;">Jumlah Mobil : {{ $jmlData }}</p>
    </div>
  </footer>
  <!-- footer end -->
 @endsection
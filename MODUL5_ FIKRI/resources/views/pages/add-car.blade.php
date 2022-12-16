@extends('../layout')
@section('content')
  <!-- Form -->
  <section id='form'>
    <div class="container">
      <h1 class="tambahh1">Tambah Mobil</h1>
      <p class="tambahp">Anda baru saja membeli mobil baru? silahkan tambahkan ke daftar showroom anda :)</p>
      <form onsubmit="return confirm('Apakah anda yakin ingin menambah data?')" action="{{ url('save-car') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama Mobil</label>
        <input type="text" id="nama" class="@error('name') is-invalid @enderror" name="name" >
         <!-- error message untuk name -->
         @error('name')
              <div class="alert alert-danger mt-2">
                  {{ $message }}
              </div>
          @enderror
        <label for="pemilik">Nama Pemilik</label>
        <input type="text" id="pemilik" class="@error('owner') is-invalid @enderror" name="owner">
        @error('owner')
          <div class="alert alert-danger mt-2">
              {{ $message }}
          </div>
        @enderror
        <label for="merk">Merk</label>
        <input type="text" id="merk" class="@error('brand') is-invalid @enderror" name="brand" >
        @error('brand')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        <label for="tanggalbeli">Tanggal Beli</label>
        <input type="date" id="tanggalbeli" class="@error('purchase_date') is-invalid @enderror" name="purchase_date">
        @error('purchase_date')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        <label for="desc">Deskripsi</label>
        <textarea id="desc" name="description" class="@error('description') is-invalid @enderror" style="height:200px; width: 1000px; border-radius: 8px;"></textarea>
        @error('description')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        <label for="inputGroupFile01">Foto</label>
        <input type="file" class="@error('foto') is-invalid @enderror" accept=".jpg,.png" class="form-control" id="inputGroupFile01" name="foto" style="height: 40px;">
        @error('foto')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        <label for="status">Status Pembayaran</label>
        <span class="d-flex">
          <input type="radio" class="@error('status') is-invalid @enderror" name="status" id="lunas" value="Lunas" style="width: 15px; height: 15px; margin-right:10px;">
          <label for="lunas" style="margin-top: 15px; margin-right:10px;">Lunas</label>
          <input type="radio" class="@error('status') is-invalid @enderror" name="status" id="belum" value="Belum-Lunas" style="width: 15px; height: 15px; margin-right:10px;">
          <label for="belum" style="margin-top: 15px;">Belum Lunas</label>
        </span>
        
        <button type="submit" class="btn btn-primary" style="margin-top: 40px;">Tambah Mobil</button>
      </form>
    </div>
  </section>
  <!-- Form End -->
@endsection
@extends('../layout')
@section('content')
<!-- Form -->
<section id='detail'>
    <div class="container">
      <h1 class="tambahh1">{{ $getDetail["name"] }}</h1>
        <p class="tambahp">Detail Mobil {{ $getDetail["name"] }}</p>
        <div class="d-flex justify-content-center align-items-start gap-5 mt-5">
          <img src="{{ asset('uploads/'.$getDetail['foto']) }}" alt="foto_mobil">
          <form onsubmit="return confirm('Apakah anda yakin ingin mengubah data?')" action="{{ url('update-car', $getDetail['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" value="{{ $getDetail['id'] }}">
            <label for="nama">Nama Mobil</label>
            <input type="text" id="nama" class="@error('name') is-invalid @enderror" name="name" value="{{ $getDetail['name'] }}">
            @error('name')
              <div class="alert alert-danger mt-2">
                  {{ $message }}
              </div>
            @enderror
            <label for="pemilik">Nama Pemilik</label>
            <input type="text" id="pemilik" name="owner" class="@error('owner') is-invalid @enderror" value="{{ $getDetail['owner'] }}">
            @error('owner')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            <label for="merk">Merk</label>
            <input type="text" id="merk" name="brand" class="@error('brand') is-invalid @enderror" name="brand" value="{{ $getDetail['brand'] }}">
            @error('brand')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            <label for="tanggalbeli">Tanggal Beli</label>
            <input type="date" id="tanggalbeli" name="purchase_date" class="@error('purchase_date') is-invalid @enderror" value="{{ date('Y-m-d',strtotime($getDetail['purchase_date'])) }}">
            @error('purchase_date')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            <label for="desc">Deskripsi</label>
            <textarea id="desc" name="description" class="@error('description') is-invalid @enderror" style="height:200px; width: 600px; border-radius: 8px;">{{ $getDetail['description'] }}</textarea>
            @error('description')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto">
            <span value="{{ $getDetail['foto'] }}">{{ $getDetail['foto'] }}</span>
            <input type="hidden" name="old" value="{{ $getDetail['foto'] }}">
            @error('foto')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            <label for="status">Status Pembayaran</label>
            <span class="d-flex">
              <input type="radio" name="status" class="@error('status') is-invalid @enderror" id="lunas" value="Lunas" {{ (($getDetail['status'] == 'Lunas') ? 'checked="checked"' : '') }} style="width: 15px; height: 15px; margin-right:10px;">
              <label for="lunas" style="margin-top: 15px; margin-right:10px;">Lunas</label>
              <input type="radio" name="status" class="@error('status') is-invalid @enderror" id="belum" value="Belum-Lunas" {{ (($getDetail['status'] == 'Belum-Lunas') ? 'checked="checked"' : '') }} . " style="width: 15px; height: 15px; margin-right:10px;">
              <label for="belum" style="margin-top: 15px;">Belum Lunas</label>
            </span>
            @error('status')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            <button type="submit" class="btn btn-primary" style="margin-top: 40px;">Update</button>
          </form>
        </div>
    </div>
  </section>
  <!-- Form End -->
@endsection
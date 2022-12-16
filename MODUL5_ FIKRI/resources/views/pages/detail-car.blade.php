@extends('../layout')
@section('content')
  <!-- Form -->
  <section id='detail'>
    <div class="container">
      <h1 class="tambahh1">{{ $getDetail["name"] }}</h1>
        <p class="tambahp">Detail Mobil {{ $getDetail["name"] }}</p>
        <div class="d-flex justify-content-center align-items-start gap-5 mt-5">
          <img src="{{ asset('uploads/'.$getDetail['foto']) }}" alt="foto_mobil">
          <form action="" enctype="multipart/form-data">
            <label for="nama">Nama Mobil</label>
            <input type="text" id="nama" name="nama" value="{{ $getDetail['name'] }}" readonly>
            <label for="pemilik">Nama Pemilik</label>
            <input type="text" id="pemilik" name="pemilik" value="{{ $getDetail['owner'] }}" readonly>
            <label for="merk">Merk</label>
            <input type="text" id="merk" name="merk" value="{{ $getDetail['brand'] }}" readonly>
            <label for="tanggalbeli">Tanggal Beli</label>
            <input type="date" id="tanggalbeli" name="tanggalbeli" value="{{ date('Y-m-d',strtotime($getDetail['purchase_date'])) }}" readonly>
            <label for="desc">Deskripsi</label>
            <textarea id="desc" name="desc" style="height:200px; width: 600px; border-radius: 8px;" readonly>{{ $getDetail['description'] }}</textarea>
            <label for="inputGroupFile01">Foto</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="inputGroupFile01" value="{{ $getDetail['foto'] }}" readonly>
            </div>
            <label for="status">Status Pembayaran</label>
            <span class="d-flex">
              <input type="radio" name="status" id="lunas" value="Lunas" {{ (($getDetail['status'] == 'Lunas') ? 'checked="checked"' : '') }} style="width: 15px; height: 15px; margin-right:10px;" disabled>
              <label for="lunas" style="margin-top: 15px; margin-right:10px;">Lunas</label>
              <input type="radio" name="status" id="belum" value="Belum-Lunas" {{ (($getDetail['status'] == 'Belum-Lunas') ? 'checked="checked"' : '') }} . " style="width: 15px; height: 15px; margin-right:10px;" disabled>
              <label for="belum" style="margin-top: 15px;">Belum Lunas</label>
            </span>
            <a href="{{ url('edit-car/'.$getDetail['id']) }}" class="btn btn-primary" style="margin-top: 40px;">Edit</a>
          </form>
        </div>
    </div>
  </section>
  <!-- Form End -->
@endsection
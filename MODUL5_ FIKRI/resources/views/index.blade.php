@extends('layout')
@section('content')
<!-- Jumbotron -->
<section id="home">
    <div class="container">
      <div class="d-flex justify-content-center align-items-center mt-5">
        <div>
          <h1>Ben arrivato<br /> Di Showroom Fikri Fathoni</h1>
          <p class="mt-3 text-muted">Qui forniamo servizi di acquisto e vendita di auto.<br />È garantito che se effettui una vendita o acquisti una transazione di auto qui, sarà sicuro </p>
          @if(Session::get('login') == null)

          @else
          <a class="btn btn-primary w-25" href="{{ ($jmlData > 0) ? '/list-car' : '/add-car' }}">My Car</a>
          @endif
          <div class="d-flex align-items-center gap-5 mt-5">
            <img src="{{ asset('component/images/logo-ead.png') }}" alt="logoead" style="width:100px;">
            <p style="margin-top: 20px; font-size:14px;">Fikri Fathoni_1202204112</p>
          </div>
        </div>
        <img src="{{ asset('component/images/download.gif') }}" alt="mobil">
      </div>
    </div>
  </section>
  <!-- Jumbotron End -->
@endsection
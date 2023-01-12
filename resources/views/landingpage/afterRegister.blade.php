@extends('landingpage.index')
@section('content')
<section class="section about">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 align-self-center">
                <div class="image-block bg-about">
                    <img class="img-fluid" src="{{ url('images/speakers/toni.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 align-self-center">
                <div class="content-block">
                    <h2>Terima Kasih <span class="alternate">Sudah Melakukan Registrasi</span></h2>
                    <div class="description-one">
                        <p>
                            Mohon Tunggu konfimasi dari admin kami
                        </p>
                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{url('login')}}" class="btn btn-main-md">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
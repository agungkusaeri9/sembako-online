@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img style="height:400px" src="{{ asset('assets/image/home_banner_6-12_des_2021.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img style="height:400px" src="{{ asset('assets/image/Banner-toko-sembako-keren-1024x410.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img style="height:400px" src="{{ asset('assets/image/8606d9f80662ffe52de2039aea7bfdc1.png') }}" class="d-block w-100" alt="...">
                  </div>
                </div>
               <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </button>
              </div>
        </div>
    </div>
    <section class="product">
        <div class="row mt-3">
            <div class="col-12">
                <h5>Produk Terlaris</h5>
            </div>
        </div>
        <div class="row">
           @foreach ($best_seller as $best)
            <div class="col-md-3">
                <a href="">
                    <div class="card" style="height:290px">
                        <img src="{{ $best->image() }}" class="card-img-top" alt="..." style="height:200px">
                        <div class="card-body">
                            <h5 class="card-text text-dark">{{ $best->name }}</h5>
                            <h6 class="card-title text-dark">Rp. {{ number_format($best->price) }}</h6>
                        </div>
                    </div>
                </a>
            </div>
           @endforeach
        </div>
    </section>
</div>
@endsection
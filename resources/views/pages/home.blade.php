@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                    <div class="carousel-item @if($slider->id == $sliders->first()->id) active @endif">
                        <img style="height:400px" src="{{  $slider->image() }}" class="d-block w-100" alt="...">
                      </div>
                    @endforeach
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
                <h5>Anda mungkin suka</h5>
            </div>
        </div>
        <div class="row">
           @foreach ($best_seller as $best)
            <div class="col-md-3 mb-3">
                <a href="{{ route('products.show', $best->slug) }}">
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
    <section class="product">
      <div class="row mt-3">
        <div class="col-12">
            <h5>Produk Lainnya</h5>
        </div>
    </div>
    <div class="row">
       @foreach ($lainnya as $lain)
        <div class="col-md-3 mb-3">
            <a href="{{ route('products.show', $lain->slug) }}">
                <div class="card" style="height:290px">
                    <img src="{{ $lain->image() }}" class="card-img-top" alt="..." style="height:200px">
                    <div class="card-body">
                        <h5 class="card-text text-dark">{{ $lain->name }}</h5>
                        <h6 class="card-title text-dark">Rp. {{ number_format($lain->price) }}</h6>
                    </div>
                </div>
            </a>
        </div>
       @endforeach
    </div>
    </section>
</div>
@endsection
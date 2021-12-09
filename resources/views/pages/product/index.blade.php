@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h5>Semua Produk</h5>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 my-1">
            <a href="{{ route('products.show', $product->slug) }}">
                <div class="card" style="height:250px">
                    <img src="{{ $product->image() }}" class="card-img-top" alt="..." style="height:150px">
                    <div class="card-body">
                        <h5 class="card-text text-dark">{{ $product->name }}</h5>
                        <h6 class="card-title text-dark">Rp. {{ number_format($product->price) }}</h6>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
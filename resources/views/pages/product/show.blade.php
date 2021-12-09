@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <img src="{{ $item->image() }}" alt="{{ $item->name }}" class="img-fluid w-100">
            <div class="detail">
                <strong>Detail</strong>
                <table class="small">
                    <tr>
                        <td>Jenis </td>
                        <td> : {{ $item->type }}</td>
                    </tr>
                    <tr>
                        <td>Satuan </td>
                        <td> : {{ $item->unit }}</td>
                    </tr>
                    <tr>
                        <td>Stok </td>
                        <td> : 
                            @if ($item->status == 1)
                            Tersedia
                            @else
                            Tidak Tersedia
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Harga </td>
                        <td> : Rp. {{ number_format($item->price) }}</td>
                    </tr>
                </table>
            </div>
            <div class="description mt-3">
                <strong>Deskripsi</strong>
                <p>{{ $item->description }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-body">
                    <h6>{{ $item->type }}</h6>
                    <h4>{{ $item->name }}</h4>
                    <h2 class="mt-3">Rp. {{ number_format($item->price) }}</h2>
                    <div class="form mt-5">
                        <form action="{{ route('carts.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <div class="form-group">
                                <label for="qty">Jumlah</label>
                                <input type="number" class="form-control" value="1" style="width: 60px" name="qty">
                            </div>
                            <div class="form-group">
                                <label for="description">Keterangan</label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Masukan Keterangan Produk"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary float-right">Tambah Keranjang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <h5>Produk Lainnya</h5>
        </div>
    </div>
    <div class="row">
        @foreach ($outhers as $outher)
        <div class="col-md-3 my-1">
            <a href="{{ route('products.show', $outher->slug) }}">
                <div class="card" style="height:250px">
                    <img src="{{ $outher->image() }}" class="card-img-top" alt="..." style="height:150px">
                    <div class="card-body">
                        <h5 class="card-text text-dark">{{ $outher->name }}</h5>
                        <h6 class="card-title text-dark">Rp. {{ number_format($outher->price) }}</h6>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h4>Keranjang Saya</h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width=20>No.</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $cart)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $cart->product->name }}</td>
                        <td class="text-right">
                            Rp. {{ number_format($cart->product->price) }}
                        </td>
                        <td>{{ $cart->qty }}</td>
                        <td>{{ $cart->description }}</td>
                        <td class="text-right">
                            Rp. {{ number_format($cart->total) }}
                        </td>
                        <td>
                            <form action="{{ route('cart.destroy', $cart->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" class="text-center">Total</td>
                        <td class="text-right">
                            Rp. {{ number_format($items->sum('total')) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-5">
                        Checkout
                    </h5>
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" required value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" required value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-3 col-form-label">No. HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <textarea name="address" id="address" cols="30" rows="3" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_id" class="col-sm-3 col-form-label">Pembayaran</label>
                            <div class="col-sm-9">
                               <select name="bank_id" id="bank_id" class="form-control" required>
                                   <option value="" selected disabled>-- Pilih Pembayaran --</option>
                                   @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="courier_id" class="col-sm-3 col-form-label">Pengiriman</label>
                            <div class="col-sm-9">
                               <select name="courier_id" id="courier_id" class="form-control" required>
                                   <option value="" selected disabled>-- Pilih Pengiriman --</option>
                                   @foreach ($couriers as $courier)
                                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right">Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
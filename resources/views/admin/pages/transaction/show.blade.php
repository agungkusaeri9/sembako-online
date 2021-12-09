@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <h6 class="card-header">
                Transaksi
            </h6>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="190">Nomor Transaksi</th>
                        <td>{{ $item->code }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $item->email }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $item->address }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $item->description ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th>Total Transaksi</th>
                        <td>Rp. {{ number_format($item->transaction_total) }}</td>
                    </tr>
                    <tr>
                        <th>Aksi</th>
                        <td>
                            <div class="dropdown d-inline">
                                <a class="btn btn-sm btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                    Update Status
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                   @if ($item->status === 'PENDING')
                                   <a class="dropdown-item" href="{{ route('admin.transactions.set-status',$item->id) }}?status=SUCCESS">Set SUCCESS</a>
                                   <a class="dropdown-item" href="{{ route('admin.transactions.set-status',$item->id) }}?status=FAILED">Set FAILED</a>
                                   @elseif($item->status === 'FAILED')
                                   <a class="dropdown-item" href="{{ route('admin.transactions.set-status',$item->id) }}?status=SUCCESS">Set SUCCESS</a>
                                   <a class="dropdown-item" href="{{ route('admin.transactions.set-status',$item->id) }}?status=PENDING">Set PENDING</a>
                                   @else
                                   <a class="dropdown-item" href="{{ route('admin.transactions.set-status',$item->id) }}?status=FAILED">Set FAILED</a>
                                   <a class="dropdown-item" href="{{ route('admin.transactions.set-status',$item->id) }}?status=PENDING">Set PENDING</a>
                                   @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Produk</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="10">No.</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                    @foreach ($item->details as $detail)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $detail->product->name }}</td>
                        <td>Rp. {{ number_format($detail->product->price) }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td>Rp. {{ number_format($detail->total) }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="text-dark">Data Transaksi</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered w-100" id="table" >
                    <thead>
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th class="text-center">Nomor Transaksi</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Bank</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Status</th>
                            <th width="160" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->bank->name ?? ' - ' }}</td>
                                <td>Rp. {{ number_format($item->transaction_total) }}</td>
                                <td>
                                    @if ($item->status === 'PENDING')
                                    <div class="badge badge-warning">{{ $item->status }}</div>
                                    @elseif($item->status === 'FAILED')
                                    <div class="badge badge-danger">{{ $item->status }}</div>
                                    @else 
                                    <div class="badge badge-success">{{ $item->status }}</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.transactions.show',$item->id) }}" class="btn btn-sm btn-warning text-white"><i class="fas fa-eye"></i></a>
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
                                    <form action="{{ route('admin.transactions.destroy', $item->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $('#table').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
  });
</script>
@if (session('success'))
<script>
    toastr.success('{{ session('success') }}.')
</script>
@endif
@endpush
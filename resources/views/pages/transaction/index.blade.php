@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h4 class="mb-4">Histori Transaksi</h4>
            <table class="table table-bordered w-100" id="table" >
                <thead>
                    <tr>
                        <th width="40" class="text-center">#</th>
                        <th class="text-center">Nomor Transaksi</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Bank</th>
                        <th class="text-center">Kurir</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Status</th>
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
                            <td>{{ $item->courier->name ?? ' - ' }}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
    });
  });
</script>
@endpush
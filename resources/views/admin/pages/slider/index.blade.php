@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="text-dark">Data Slider</h6>
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-sm btn-primary">Tambah Slider</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered w-100" id="table">
                    <thead>
                        <tr>
                            <th width="10" class="text-center">No.</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Status</th>
                            <th width="150" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td><img src="{{ $item->image() }}" alt="" class="img-fluid" style="height: 80px;width:80px"></td>
                                <td class="text-center">
                                    @if ($item->status == 0)
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                    @else 
                                    <span class="badge badge-success">Aktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.sliders.set-status', $item->id) }}" class="d-inline" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $item->status }}" name="status">
                                        @if ($item->status ==0 )
                                        <button class="btn btn-sm btn-success">Set Aktif</button>
                                        @else 
                                        <button class="btn btn-sm btn-info">Set Tidak Aktif</button>
                                        @endif
                                    </form>
                                    <form action="{{ route('admin.sliders.destroy', $item->id) }}" class="d-inline" method="post">
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
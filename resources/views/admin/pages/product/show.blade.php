@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6>{{ $item->name }}</h6>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Gambar</th>
                                    <td>
                                        <img src="{{ $item->image() }}" alt="" class="img-fluid" style="max-height: 80px">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $item->name }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis</th>
                                    <td>{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <td>{{ $item->unit }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. {{ number_format($item->price) }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($item->status === 0)
                                        <span class="badge badge-danger">Tidak Tersedia</span>
                                        @else 
                                        <span class="badge badge-success">Tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Deskripsi</h6>
                        {!! $item->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@push('scripts')
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script>
    $('body').on('click','.btnImg', function(){
        var src = $(this).data('src');
        $('#modalImg').attr('src',src);
        var id = $(this).data('id');
        var action = '{{ url('admin/product-galleries') }}' + '/' + id;
        $('#formDelete').attr('action',action);
        $('#myModal').modal('show');
    })

    $('.btnAddPhoto').on('click', function(){
        $('#modalAddPhoto').modal('show');
    })
</script>
@if (session('success'))
<script>
    toastr.success('{{ session('success') }}.')
</script>
@elseif (session('error'))
<script>
    toastr.error('{{ session('error') }}.')
</script>
@endif
@endpush
@extends('admin.layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="text-dark text-center">Edit Ekspedisi</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.couriers.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Nama Ekspedisi</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name ?? old('name') }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.couriers.index') }}" class="btn btn-warning">Batal</a>
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
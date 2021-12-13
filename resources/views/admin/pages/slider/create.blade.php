@extends('admin.layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="text-dark text-center">Tambah Slider</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="active" value="1" checked>
                            <label class="form-check-label" for="active">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="non_active" value="0">
                            <label class="form-check-label" for="non_active">Tidak Aktif</label>
                        </div>
                        @error('status')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.sliders.index') }}" class="btn btn-warning">Batal</a>
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
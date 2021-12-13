@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Profil Saya</h5>
                    <div class="text-center my-3">
                        <img src="{{ $user->avatar() }}" alt="" class="img-fluid rounded-circle">
                        <div class="d-flex justify-content-between mt-4">
                            <span class="font-weight-bold">Nama</span>
                            <span>{{ $user->name }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <span class="font-weight-bold">Username</span>
                                <span>{{ $user->username }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <span class="font-weight-bold">Email</span>
                            <span>{{ $user->email }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <span class="font-weight-bold">Bergabung</span>
                            <span>{{ $user->created_at->translatedFormat('l, d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">Edit Profile</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name ?? old('name') }}">
                            @error('name')
                                <div class="is-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $user->username ?? old('username') }}" readonly>
                            @error('username')
                                <div class="is-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email ?? old('email') }}">
                            @error('email')
                                <div class="is-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="is-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar" value="{{ old('avatar') }}">
                            @error('avatar')
                                <div class="is-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
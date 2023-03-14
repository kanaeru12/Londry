@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

<!-- Main Content goes here -->

<div class="card">
    <div class="card-body">
        <form action="{{ route('basic.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Nama Depan</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="Nama Depan" autocomplete="off" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Nama Belakang</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                    id="last_name" placeholder="Nama Belakang" autocomplete="off" value="{{ old('last_name') }}">
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Peran</label>
                <select class="form-select form-control @error('role') is-invalid @enderror" name="role" id="role"
                    placeholder="Roles" autocomplete="off" value="{{ old('role') }}">
                    <option selected name="role">pilih peran</option>
                    <option value="admin">Admin</option>
                    <option value="owner">Owner</option>
                    <option value="kasir">Kasir</option>

                    <select>
                        @error('role')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
            </div>

            <div class="form-group">
                <label for="outlet">Outlet</label>
                <select class="form-select form-control @error('id_outlet') is-invalid @enderror" name="id_outlet" id="id_outlet"
                    placeholder="Outlet" autocomplete="off" value="{{ old('id_outlet') }}">
                    <option selected name="id_outlet">Outlet</option>
                    @foreach ($outlet as $otl)
                        <option value="{{ $otl->id }}">{{ $otl->nama }}</option>
                    @endforeach
                    <select>
                        @error('role')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    placeholder="Email" autocomplete="off" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="Password" autocomplete="off">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('basic.index') }}" class="btn btn-default">Kembali</a>

        </form>
    </div>
</div>

<!-- End of Main Content -->
@endsection

@push('notif')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
    {{ session('warning') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif
@endpush

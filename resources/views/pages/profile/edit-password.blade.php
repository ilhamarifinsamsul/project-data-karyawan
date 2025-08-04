@extends('partials.layouts.app')
@section('title', 'Edit Password')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Profile</li>
                    <li class="breadcrumb-item active">Edit Password</li>
                </ol>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- Main Content --}}
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update-password') }}" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input id="nik" type="text" class="form-control" name="nik" value="{{ Auth::user()->nik }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="name">Nama Karyawan</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $profile->name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="departement_id">Deaprtement</label>
                            <input id="departement_id" type="text" class="form-control" name="departement_id" value="{{ $profile->departement->name ?? '-' }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="role_id">Lever Users</label>
                            <input id="role_id" type="text" class="form-control" name="role_id" value="{{ $profile->role->name ?? '-' }}" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update-password') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <input id="shift" type="text" class="form-control" name="shift" value="{{ $profile->shift ?? '-' }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="password">Password Lama</label>
                            <input id="current_password" type="password" class="form-control" name="current_password" required autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input id="new_password" type="password" class="form-control" name="new_password" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password">Konfirmasi Password</label>
                            <input id="confirm_password" type="password" class="form-control" name="confirm_password" required autocomplete="confirm_password">
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary mt-3 mr-2">Simpan</button>
                            <a href="{{ route('profile.index') }}" class="btn btn-secondary mt-3">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
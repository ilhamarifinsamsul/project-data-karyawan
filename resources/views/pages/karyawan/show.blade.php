@extends('partials.layouts.app')
@section('title', 'Karyawan')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">List Karyawan</li>
                    <li class="breadcrumb-item active">Detail Karyawan</li>
                </ol>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- Main Content --}}
<section class="content">
    <div class="container-fluid">
        <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Back</a>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">
                        Detail Karyawan
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" value="{{ $karyawan->nik }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="name">Nama Karyawan</label>
                            <input type="text" name="name" id="name" value="{{ $karyawan->name }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="departement_id">Departement</label>
                            <input type="text" name="departement_id" id="departement_id" value="{{ $karyawan->departement->name }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <input type="text" name="shift" id="shift" value="{{ $karyawan->shift }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="role_id">Level User</label>
                            <input type="text" name="role_id" id="role_id" value="{{ $karyawan->role->name }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
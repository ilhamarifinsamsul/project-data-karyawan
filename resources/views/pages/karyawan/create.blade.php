@extends('partials.layouts.app')
@section('title', 'Karyawan')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Input Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">List Karyawan</li>
                    <li class="breadcrumb-item active">Input Karyawan</li>
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
        <form action="{{ route('karyawan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Input Karyawan
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK">
                        </div>

                        @error('nik')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror

                        <div class="form-group">
                            <label for="name">Nama Karyawan</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Karyawan">
                        </div>

                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror

                        <div class="form-group">
                            <label for="departement_id">Departement</label>
                            <select name="departement_id" id="departement_id" class="form-control">
                                <option value="">-- Choose Departement --</option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('departement_id')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Input Karyawan
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" id="shift" class="form-control">
                                <option value="">-- Choose Shift --</option>
                                <option value="Non-Shift">Non-Shift</option>
                                <option value="Shift 1">Shift 1</option>
                                <option value="Shift 2">Shift 2</option>
                                <option value="Shift 3">Shift 3</option>
                            </select>
                        </div>

                        @error('shift')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror

                        <div class="form-group">
                            <label for="role_id">Level User</label>
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">-- Choose Level User --</option>
                                @foreach ($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('role_id')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
@endsection
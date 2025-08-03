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
                    <li class="breadcrumb-item active">Edit Karyawan</li>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ $karyawan->nik }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Nama Karyawan</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $karyawan->name }}">
                            </div>

                            <div class="form-group">
                                <label for="departement_id">Departement</label>
                                <select name="departement_id" id="departement_id" class="form-control">
                                    <option value="">-- Choose Departement --</option>
                                    @foreach ($departements as $d)
                                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="shift">Shift</label>
                                <select name="shift" id="shift" class="form-control">
                                    <option value="{{ $karyawan->shift }}">-- Choose Shift --</option>
                                    <option value="Non-Shift">Non-Shift</option>
                                    <option value="Shift 1">Shift 1</option>
                                    <option value="Shift 2">Shift 2</option>
                                    <option value="Shift 3">Shift 3</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="role_id">Level User</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="{{ $karyawan->role_id }}">-- Choose Level User --</option>
                                    @foreach ($roles as $r)
                                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
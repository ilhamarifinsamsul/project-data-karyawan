@extends('partials.layouts.app')
@section('title', 'Edit Departement')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">List Departement</li>
                    <li class="breadcrumb-item active">Edit</li>
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
        <form action="{{ route('departement.update', $departement->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-5 mb-2">
                <div class="card">
                    <div class="card-header">
                        Edit Departement
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Departement"></label>
                            <input type="text" name="name" id="name" value="{{ old('name', $departement->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Departement">
                        </div>

                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
@endsection
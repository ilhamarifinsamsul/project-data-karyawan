@extends('partials.layouts.app')
@section('title', 'Create Departement')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New Departement</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">list Departement</li>
                    <li class="breadcrumb-item active">Input Departement</li>
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
        <form action="{{ route('departement.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-5 mb-2">
                    <div class="card">
                        <div class="card-header">
                            New Departement
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Departement</label>
                                <input type="text" class="form-control" @error('name') is-invalid
                                @enderror
                                name="name"
                                id="name"
                                placeholder="Nama Departement">
                            </div>
                            @error('name')
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
@extends('partials.layouts.app')
@section('title', 'Profile')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
            <div class="col-12">
                @if (session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" class="text-white">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama Karyawan</th>
                                <th>Departement</th>
                                <th>Level User</th>
                                <th>Shift</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $a = 1;
                                @endphp
                                @foreach ($profile as $p)
                                    <tr>
                                        <td>{{ $a++ }}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->departement->name ?? '-' }}</td>
                                        <td>{{ $p->role->name ?? '-' }}</td>
                                        <td>{{ $p->shift }}</td>
                                        <td>
                                            <a href="{{ route('profile.edit-password', $p['id']) }}" class="btn btn-primary btn-sm d-inline"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
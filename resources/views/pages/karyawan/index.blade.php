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
                                {{-- pesan sukses --}}
                @if (session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" class="text-white">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Pesan Delete --}}
                @if (session()->get('deleted'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('deleted') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>Input Karyawan</a>
                <div class="card">
                    <div class="card-header">
                        List Karyawan
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Nama Karyawan</th>
                                    <th>Departement</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 1;
                                @endphp
                                @foreach ($karyawan as $k)
                                    <tr>
                                        <td>{{ $a++ }}</td>
                                        <td>{{ $k->nik }}</td>
                                        <td>{{ $k->name }}</td>
                                        <td>{{ $k->departement->name }}</td>

                                        <td>
                                        <a href="{{ route('karyawan.edit', $k['id']) }}" class="btn btn-primary btn-sm d-inline"><i class="fas fa-edit"></i></a>
    
                                        <a href="{{ route('karyawan.show', $k['id']) }}" class="btn btn-success btn-sm d-inline"><i class="fas fa-eye"></i></a>
    
                                        <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                        </form>
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

@section('script')
    <script>
        var table = $('#table').DataTable({
            responsive: true,
            "dom": 'Bflrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            "pageLength": 5,
            "lengthMenu": [
                [5, 100, 1000, -1],
                [5, 100, 1000, "ALL"],
            ],

        })
    </script>
@endSection
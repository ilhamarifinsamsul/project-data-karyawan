@extends('partials.layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="container-fluid mt-2">
    <div class="row">
        {{-- card total karyawan --}}
        @if (session()->get('role') == 'Super Admin' || session()->get('role') == 'Admin' || session()->get('role') == 'Super User')
        <div class="col-lg-6 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalKaryawan }}</h3>
                    <p>Total Karyawan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ route('karyawan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- end card total karyawan --}}
        @endif


        @if (session()->get('role') == 'Super Admin' || session()->get('role') == 'Super User')
            
        {{-- card total departement --}}
        <div class="col-lg-6 col-12 mb-2">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalDepartement }}</h3>
                    <p>Total Departement</p>
                </div>
                <div class="icon">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a href="{{ route('departement.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- end card total departement --}}
        @endif
    </div>
</div>

@endsection
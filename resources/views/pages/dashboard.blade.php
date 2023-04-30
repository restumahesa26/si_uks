@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-3">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <h4 class="font-weight-bold text-dark">Halo, {{ Auth::user()->nama }}</h4>
        <p class="font-weight-normal mb-2 text-muted">{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('l, d F Y') }}</p>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 flex-column d-flex grid-margin stretch-card">
        <div class="row flex-grow">
            <div class="col-sm-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Jumlah Siswa</h4>
                        <h4 class="text-dark font-weight-bold mb-2">{{ $siswa }} orang</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Jumlah Petugas</h4>
                        <h4 class="text-dark font-weight-bold mb-2">{{ $petugas }} orang</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pemeriksaan Minggu Ini</h4>
                        <h4 class="text-dark font-weight-bold mb-2">Total : {{ $pemeriksaan }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $chart->options['chart_title'] }}</h4>
                {!! $chart->renderHtml() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
@endpush

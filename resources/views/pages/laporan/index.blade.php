@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')
<div class="row mb-3">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <h4 class="font-weight-bold text-dark">Laporan Pemeriksaan</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-4 flex-column d-flex grid-margin stretch-card">
        <div class="card" style="border-radius: 14px">
            <div class="card-body">
                <p class="font-weight-bold">Cetak Laporan Bulan Ini</p>
                <a href="{{ route('laporan.cetak-bulan-ini') }}" class="btn btn-primary" target="_blank">
                    <i class="fa fa-print"></i> Cetak Laporan
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4 flex-column d-flex grid-margin stretch-card">
        <div class="card" style="border-radius: 14px">
            <div class="card-body">
                <p class="font-weight-bold">Cetak Laporan Berdasarkan Tanggal</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-print"></i> Cetak Laporan
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Berdasarkan Tanggal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('laporan.cetak-bulan') }}" method="GET" target="_blank">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="tanggal_awal">Tanggal Awal</label>
                                        <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_akhir">Tanggal Akhir</label>
                                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4 flex-column d-flex grid-margin stretch-card">
        <div class="card" style="border-radius: 14px">
            <div class="card-body">
                <p class="font-weight-bold">Cetak Semua Laporan</p>
                <a href="{{ route('laporan.cetak') }}" class="btn btn-primary" target="_blank">
                    <i class="fa fa-print"></i> Cetak Laporan
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-12 flex-column d-flex grid-margin stretch-card mt-1">
        <div class="card" style="border-radius: 20px">
            <div class="card-body">
                <p class="font-weight-bold text-black" style="font-size: 16px">
                    <i class="fa fa-history"></i> Riwayat 10 Pemeriksaan Terakhir
                </p>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Identitas Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal</th>
                                <th>Petugas</th>
                                <th>Obat</th>
                                <th>Terapi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->siswa->nama }} ({{ $item->siswa->nis }})</td>
                                <td>{{ $item->siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $item->user->nama }}</td>
                                <td>
                                    @if ($item->obat)
                                    <ul class="text-left" style="margin: 0">
                                        @forelse ($item->obat as $item2)
                                        <li>{{ $item2->obat->nama }}</li>
                                        @empty
                                        <li>Tidak Ada</li>
                                        @endforelse
                                    </ul>
                                    @else
                                    Tidak Ada
                                    @endif
                                </td>
                                <td>{{ $item->terapi }}</td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="6">-- Data Kosong --</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

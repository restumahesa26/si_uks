@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('content')
<div class="row mb-3">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <h4 class="font-weight-bold text-dark">Data Siswa</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12 flex-column d-flex grid-margin stretch-card">
        <div class="card" style="border-radius: 20px">
            <div class="card-body">
                <form action="{{ route('data-siswa.update', $item->nis) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NIS</label><sup class="text-danger">(wajib diisi)</sup>
                                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="Masukkan NIS" value="{{ old('nis', $item->nis) }}" required>
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label><sup class="text-danger">(wajib diisi)</sup>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" value="{{ old('nama', $item->nama) }}" required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label><sup class="text-danger">(wajib dipilih)</sup>
                                <div class="form-check">
                                    <label class="form-check-label text-dark">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="L"
                                            value="L" @if (old('jenis_kelamin', $item->jenis_kelamin) == 'L') checked @endif required>
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label text-dark">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="P"
                                            value="P" @if (old('jenis_kelamin', $item->jenis_kelamin) == 'P') checked @endif required>
                                        Perempuan
                                    </label>
                                </div>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label><sup class="text-danger">(wajib diisi)</sup>
                                <input type="number" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" placeholder="Masukkan Angkatan" value="{{ old('angkatan', $item->angkatan) }}" min="2000" required>
                                @error('angkatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp">Nomor Handphone</label><sup class="text-danger">(wajib diisi)</sup>
                                <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan Nomor Handphone" value="{{ old('no_hp', $item->no_hp) }}" required>
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label><sup class="text-danger">(wajib diisi)</sup>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" value="{{ old('email', $item->email) }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('data-siswa.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

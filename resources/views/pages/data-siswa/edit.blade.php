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
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="Masukkan NIS" value="{{ old('nis', $item->nis) }}">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" value="{{ old('nama', $item->nama) }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Ruangan</label>
                                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                                    <option value="" hidden>--Pilih Jenis Kelamin--</option>
                                    <option value="L" @if(old('jenis_kelamin', $item->jenis_kelamin) == 'L') selected @endif>Laki-Laki</option>
                                    <option value="P" @if(old('jenis_kelamin', $item->jenis_kelamin) == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="number" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" placeholder="Masukkan Angkatan" value="{{ old('angkatan', $item->angkatan) }}" min="2000">
                                @error('angkatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp">No.Handphone</label>
                                <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan No.Handphone" value="{{ old('no_hp', $item->no_hp) }}">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
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

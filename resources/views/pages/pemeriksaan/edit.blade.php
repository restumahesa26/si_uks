@extends('layouts.admin')

@section('title', 'Pemeriksaan')

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
                <form action="{{ route('pemeriksaan.update', $item->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Siswa</label><sup class="text-danger">(wajib dipilih)</sup><br>
                                <select id="nis" class="nis" name="nis" required style="width: 100% !important">
                                    <option value=""></option>
                                    @foreach ($siswa as $item2)
                                    <option value="{{ $item2->nis }}" @if(old('nis', $item->nis) == $item2->nis) selected @endif>{{ $item2->nis }} - {{ $item2->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="terapi_id">Terapi</label><br>
                                <select id="terapi_id" class="terapi_id" name="terapi_id[]" multiple style="width: 100% !important">
                                    <option value=""></option>
                                    @foreach ($terapi as $item2)
                                    <option value="{{ $item2->id }}" @if(in_array($item2->id, $id)) selected @endif>{{ $item2->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keluhan">Keluhan</label><sup class="text-danger">(wajib dipilih)</sup>
                                <textarea name="keluhan" id="keluhan" cols="30" rows="10" class="form-control" required>{{ old('keluhan', $item->keluhan) }}</textarea>
                                @error('keluhan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" required>{{ old('keterangan', $item->keterangan) }}</textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('pemeriksaan.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('backend/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('backend/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ url('backend/js/select2.js') }}"></script>
    <script>
        $(".terapi_id").select2({
            placeholder: "-- Pilih Jenis Terapi --",
            allowClear: true
        });
        $(".nis").select2({
            placeholder: "-- Pilih Siswa --",
            allowClear: true
        });
    </script>
@endpush

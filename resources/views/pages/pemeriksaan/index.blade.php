@extends('layouts.admin')

@section('title', 'Pemeriksaan')

@section('content')
<div class="row mb-3">
    <div class="col-sm-12 mb-4 mb-xl-0">
        <h4 class="font-weight-bold text-dark">Pemeriksaan</h4>
    </div>
</div>
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pemeriksaan.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Siswa</label><br>
                                <select id="nis" class="nis" name="nis" required style="width: 100% !important">
                                    <option value=""></option>
                                    @foreach ($siswa as $item)
                                    <option value="{{ $item->nis }}" @if(old('nis') == $item->nis) selected @endif>{{ $item->nis }} - {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="terapi">Terapi</label><br>
                                <select id="terapi" class="terapi_id" name="terapi_id[]" multiple="multiple" style="width: 100% !important">
                                    <option value=""></option>
                                    @foreach ($terapi as $item)
                                    <option value="{{ $item->id }}" @if(old('terapi_id') == $item->id) selected @endif>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keluhan">Keluhan</label>
                                <textarea name="keluhan" id="keluhan" cols="30" rows="10" class="form-control" required>{{ old('keluhan') }}</textarea>
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
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" required>{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 flex-column d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-rounded mb-3"
                    data-toggle="modal" data-target="#modalTambah">
                    <i class="fa fa-plus-circle "></i> Tambah Pemeriksaan
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Identitas Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal</th>
                                <th>Petugas</th>
                                <th>Terapi</th>
                                <th>Aksi</th>
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
                                    @if ($item->terapi)
                                    <ul class="text-left" style="margin: 0">
                                        @forelse ($item->terapi as $item2)
                                        <li>{{ $item2->terapi->nama }}</li>
                                        @empty
                                        <li>Tidak Ada</li>
                                        @endforelse
                                    </ul>
                                    @else
                                    Tidak Ada
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pemeriksaan.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm" style="box-shadow: none;"><i class="fa fa-pencil"></i> Ubah</a>
                                    <form action="{{ route('pemeriksaan.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
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

    <script src="{{ url('sweetalert2.all.min.js') }}"></script>

    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Hapus Data?',
            text: "Data Akan Terhapus Permanen",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>
@endpush

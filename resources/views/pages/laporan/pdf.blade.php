<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Pemeriksaan</title>
    <link rel="shortcut icon" href="{{ url('logo.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        @media print{
            @page {
                size: landscape
            }
        }

        body {
            font-family: 'Times New Roman';
        }

        table tr th, table tr td {
            font-size: 14px;
        }

        .table-bordered tr td {
            padding: 8px !important;
        }

        .table-bordered th, .table-bordered td{
            border: 1px solid #2C3333 !important;
        }
    </style>
</head>
<body>
    <h4 class="text-center font-weight-bold" style="font-size: 18px;">Rekap Laporan Pemeriksaan @if ($jenis == 'bulanini')
        Bulan {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('F') }} @endif</h4>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="table1">
            <thead>
                <tr class="text-center">
                    <th style="vertical-align : middle; text-align:center; width: 5%">No</th>
                    <th style="vertical-align : middle; text-align:center;">Identitas Siswa</th>
                    <th style="vertical-align : middle; text-align:center; width: 9%">Jenis Kelamin</th>
                    <th style="vertical-align : middle; text-align:center; width: 12%">Tanggal</th>
                    <th style="vertical-align : middle; text-align:center;">Petugas</th>
                    <th style="vertical-align : middle; text-align:center;">Keluhan</th>
                    <th style="vertical-align : middle; text-align:center;">Penanganan</th>
                    <th style="vertical-align : middle; text-align:center;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                    <td style="vertical-align : middle; text-align:center;">{{ $loop->iteration }}</td>
                    <td style="vertical-align : middle;">{{ $item->siswa->nama }} - {{ $item->siswa->nis }}</td>
                    <td style="vertical-align : middle; text-align:center;">
                        @if ($item->siswa->jenis_kelamin == 'L')
                            Laki-Laki
                        @elseif ($item->siswa->jenis_kelamin == 'P')
                            Perempuan
                        @endif
                    </td>
                    <td style="vertical-align : middle; text-align:center;">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                    <td style="vertical-align : middle; text-align:center;">{{ $item->user->nama }}</td>
                    <td style="vertical-align : middle;">{{ $item->keterangan }}</td>
                    <td style="vertical-align : middle;">
                        @if ($item->terapi)
                        <ul class="text-left" style="vertical-align : middle; margin: 0 !important;">
                            @forelse ($item->terapi as $item2)
                            <li style="vertical-align : middle;">{{ $item2->terapi->nama }}</li>
                            @empty
                            <li style="vertical-align : middle;">Tidak Ada</li>
                            @endforelse
                        </ul>
                        @else
                        Tidak Ada
                        @endif
                    </td>
                    <td style="vertical-align : middle;">{{ $item->keterangan }}</td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="8"> -- Data Kosong --</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
    window.print()
</script>
</html>

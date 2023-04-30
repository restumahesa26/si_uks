<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $items = Pemeriksaan::paginate(10);

        return view('pages.laporan.index', compact('items'));
    }

    public function print_bulan_ini()
    {
        $items = Pemeriksaan::whereMonth('created_at', Carbon::now()->month)->latest()->get();
        $jenis = 'bulanini';

        return view('pages.laporan.pdf', compact('items', 'jenis'));
    }

    public function print_bulan(Request $request)
    {
        $items = Pemeriksaan::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->latest()->get();
        $jenis = NULL;

        return view('pages.laporan.pdf', compact('items', 'jenis'));
    }

    public function print()
    {
        $items = Pemeriksaan::latest()->get();
        $jenis = NULL;

        return view('pages.laporan.pdf', compact('items', 'jenis'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Pemeriksaan;
use App\Models\Siswa;
use App\Models\Terapi;
use App\Models\TerapiPemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Pemeriksaan::latest()->get();
        $siswa = Siswa::all();
        $terapi = Terapi::latest()->get();

        return view('pages.pemeriksaan.index', compact('items','siswa','terapi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'keluhan' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pemeriksaan = Pemeriksaan::create([
            'petugas_id' => Auth::user()->id,
            'nis' => $request->nis,
            'keluhan' => $request->keluhan,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->terapi_id) {
            foreach ($request->terapi_id as $value) {
                TerapiPemeriksaan::create([
                    'pemeriksaan_id' => $pemeriksaan->id,
                    'terapi_id' => $value
                ]);
            }
        }

        Alert::toast('Berhasil Menambah Pemeriksaan', 'success')->position('top');
        return redirect()->route('pemeriksaan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Pemeriksaan::findOrFail($id);
        $siswa = Siswa::all();
        $terapi = Terapi::latest()->get();
        $id = TerapiPemeriksaan::where('pemeriksaan_id', $id)->pluck('terapi_id')->toArray();

        return view('pages.pemeriksaan.edit', compact('item','siswa','terapi','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'terapi_id' => 'nullable',
            'keluhan' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = Pemeriksaan::findOrFail($id);

        $item->update([
            'petugas_id' => Auth::user()->id,
            'nis' => $request->nis,
            'keluhan' => $request->keluhan,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->terapi_id) {
            TerapiPemeriksaan::where('pemeriksaan_id', $id)->delete();
            foreach ($request->terapi_id as $value) {
                TerapiPemeriksaan::create([
                    'pemeriksaan_id' => $id,
                    'terapi_id' => $value
                ]);
            }
        }else {
            TerapiPemeriksaan::where('pemeriksaan_id', $id)->delete();
        }

        Alert::toast('Berhasil Mengubah Pemeriksaan', 'success')->position('top');
        return redirect()->route('pemeriksaan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Pemeriksaan::findOrFail($id);

        $item->delete();

        Alert::toast('Berhasil Menghapus Pemeriksaan', 'success')->position('top');
        return redirect()->route('pemeriksaan.index');
    }
}

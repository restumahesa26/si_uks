<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Obat::withCount('pemeriksaan')->latest()->get();

        return view('pages.data-obat.index', compact('items'));
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
            'nama' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Obat::create([
            'nama' => $request->nama,
        ]);

        Alert::toast('Berhasil Menambah Data Obat', 'success')->position('top');
        return redirect()->route('data-obat.index');
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
        $item = Obat::findOrFail($id);

        return view('pages.data-obat.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = Obat::findOrFail($id);

        $item->update([
            'nama' => $request->nama,
        ]);

        Alert::toast('Berhasil Mengubah Data Obat', 'success')->position('top');
        return redirect()->route('data-obat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Obat::findOrFail($id);

        $item->delete();

        Alert::toast('Berhasil Menghapus Data Obat', 'success')->position('top');
        return redirect()->route('data-obat.index');
    }
}

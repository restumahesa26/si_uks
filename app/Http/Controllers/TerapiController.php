<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Terapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TerapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Terapi::withCount('pemeriksaan')->latest()->get();

        return view('pages.data-terapi.index', compact('items'));
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

        Terapi::create([
            'nama' => $request->nama,
        ]);

        Alert::toast('Berhasil Menambah Data Terapi', 'success')->position('top');
        return redirect()->route('data-terapi.index');
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
        $item = Terapi::findOrFail($id);

        return view('pages.data-terapi.edit', compact('item'));
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

        $item = Terapi::findOrFail($id);

        $item->update([
            'nama' => $request->nama,
        ]);

        Alert::toast('Berhasil Mengubah Data Terapi', 'success')->position('top');
        return redirect()->route('data-terapi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Terapi::findOrFail($id);

        $item->delete();

        Alert::toast('Berhasil Menghapus Data Terapi', 'success')->position('top');
        return redirect()->route('data-terapi.index');
    }
}

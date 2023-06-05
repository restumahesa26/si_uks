<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Siswa::withCount('pemeriksaan')->get();

        return view('pages.data-siswa.index', compact('items'));
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
            'nis' => 'required|string|max:50|unique:siswa',
            'nama' => 'required|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'angkatan' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'email' => 'nullable|string|max:50|email',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'angkatan' => $request->angkatan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        Alert::toast('Berhasil Menambah Data Siswa', 'success')->position('top');
        return redirect()->route('data-siswa.index');
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
        $item = Siswa::findOrFail($id);

        return view('pages.data-siswa.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'angkatan' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'email' => 'nullable|string|max:50|email',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error')->position('top');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = Siswa::findOrFail($id);

        if ($request->nis != $item->nis) {
            $validator2 = Validator::make($request->all(), [
                'nis' => 'required|string|max:50|unique:siswa',
            ]);

            if ($validator2->fails()) {
                Alert::toast('Perhatikan data yang diisi', 'error')->position('top');
                return redirect()->back()->withErrors($validator2)->withInput();
            }
        }

        $item->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'angkatan' => $request->angkatan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        Alert::toast('Berhasil Mengubah Data Siswa', 'success')->position('top');
        return redirect()->route('data-siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Siswa::findOrFail($id);

        $item->delete();

        Alert::toast('Berhasil Menghapus Data Siswa', 'success')->position('top');
        return redirect()->route('data-siswa.index');
    }
}

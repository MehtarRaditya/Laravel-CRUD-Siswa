<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function welcome()
    {
        return view('welcome', [
            'siswa' => Siswa::orderBy('Kelas', 'asc')->orderBy('Nama', 'asc')->get(),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
            'NISN' => 'required | unique:Siswa',
            'Kelas' => 'required',
        ],
        [
            'Nama.required' => 'Nama tidak boleh kosong!',
            'NISN.required' => 'NISN tidak boleh kosong!',
            'NISN.unique' => 'NISN sudah ada!',
            'Kelas.required' => 'Kelas tidak boleh kosong!',
        ]);

        $siswa = [
            'Nama' => $request->Nama,
            'NISN' => $request->NISN,
            'Kelas' => $request->Kelas,
        ];
        Siswa::create($siswa);

        return redirect('/');
    }

    public function edit($id)
    {
        return view('edit', [
            'edit' => Siswa::find($id),
        ]);
    }

    public function save(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
            'NISN' => 'required | unique:Siswa,NISN'. $request->NISN,
            'Kelas' => 'required',
        ],
        [
            'Nama.required' => 'Nama tidak boleh kosong!',
            'NISN.required' => 'NISN tidak boleh kosong!',
            'NISN.unique' => 'NISN sudah ada!',
            'Kelas.required' => 'Kelas tidak boleh kosong!',
        ]);

        $edit = [
            'Nama' => $request->Nama,
            'NISN' => $request->NISN,
            'Kelas' => $request->Kelas,
        ];

        Siswa::find($id)->update($edit);

        return redirect('/')->with(
            'berhasil', 'Data siswa berhasil diedit!'
        );
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/');
    }
}
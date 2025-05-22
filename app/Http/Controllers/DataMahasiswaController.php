<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

class DataMahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = DataMahasiswa::all(); // Sudah diperbaiki dari $data
        return view('data_mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('data_mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:data_mahasiswa,nim',
            'nama' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = null;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            // Pastikan folder tujuan ada
            $destination = public_path('Upload/Image');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $img = $manager->read($image->getRealPath());
            $img->resize(300, 300)->save($destination . '/' . $filename);
        }

        DataMahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'angkatan' => $request->angkatan,
            'foto' => $filename,
        ]);

        return redirect()->route('data-mahasiswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(DataMahasiswa $data_mahasiswa)
    {
        return view('data_mahasiswa.edit', compact('data_mahasiswa'));
    }

    public function update(Request $request, DataMahasiswa $data_mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = $data_mahasiswa->foto;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($filename && file_exists(public_path('Upload/Image/' . $filename))) {
                unlink(public_path('Upload/Image/' . $filename));
            }

            $image = $request->file('foto');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $img = $manager->read($image->getRealPath());
            $img->resize(300, 300)->save(public_path('Upload/Image/' . $filename));
        }

        $data_mahasiswa->update([
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'angkatan' => $request->angkatan,
            'foto' => $filename,
        ]);

        return redirect()->route('data-mahasiswa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(DataMahasiswa $data_mahasiswa)
    {
        if ($data_mahasiswa->foto && file_exists(public_path('Upload/Image/' . $data_mahasiswa->foto))) {
            unlink(public_path('Upload/Image/' . $data_mahasiswa->foto));
        }

        $data_mahasiswa->delete();

        return redirect()->route('data-mahasiswa.index')->with('success', 'Data berhasil dihapus.');
    }
}

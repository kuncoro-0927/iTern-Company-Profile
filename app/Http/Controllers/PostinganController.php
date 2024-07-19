<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostinganController extends Controller
{
    // Menampilkan postingan di halaman utama
    public function index()
    {
        // Ambil postingan terbaru (3 postingan pertama)
        $postinganAwal = Postingan::orderBy('created_at', 'desc')->take(3)->get();
        // Ambil postingan tambahan untuk "See More" (10 postingan berikutnya)
        $postinganLanjutan = Postingan::orderBy('created_at', 'desc')->skip(3)->take(10)->get();

        return view('postingan', compact('postinganAwal', 'postinganLanjutan'));
    }

    // Menampilkan view untuk menambah postingan
    public function tambah_postingan()
    {
        return view('admin.tambah_postingan');
    }

    // Menampilkan view untuk mengedit postingan berdasarkan ID
    public function edit($id)
    {
        $postingan = Postingan::findOrFail($id);
        return view('admin.edit_postingan', compact('postingan'));
    }

    // Menampilkan detail postingan berdasarkan ID
    public function show($id)
    {
        $detail = Postingan::find($id);
        return view('detail_postingan', compact('detail'));
    }

    // Menampilkan semua data postingan di halaman admin
    public function admin_postingan()
    {
        $items = Postingan::all();
        return view('admin.postingan', compact('items'));
    }

    // Menyimpan postingan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|mimes:jpeg,png,jpg,gif|max:2048', // Menerima file gambar dengan ukuran maksimum 2MB
            'tanggal_upload' => 'required|date', // Menambahkan validasi tanggal
            'deskripsi' => 'required',
        ]);

        // Upload file gambar ke server
        $gambar = $request->file('gambar')->storeAs('public/images', $request->file('gambar')->getClientOriginalName());

        // Buat record baru di database
        $dokumen = new Postingan();
        $dokumen->nama = $request->nama;
        $dokumen->gambar = $gambar;
        $dokumen->tanggal_upload = $request->tanggal_upload;
        $dokumen->deskripsi = $request->deskripsi;
        $dokumen->save();

        session()->flash('success', 'Data berhasil ditambahkan!');
        return redirect()->route('postingan.tambah')->with('success', 'Postingan berhasil ditambahkan.');
    }

    // Mengupdate postingan yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_upload' => 'required|date', // Menambahkan validasi tanggal
            'deskripsi' => 'required',
        ]);

        $dokumen = Postingan::findOrFail($id);
        $dokumen->nama = $request->nama;
        $dokumen->tanggal_upload = $request->tanggal_upload;
        $dokumen->deskripsi = $request->deskripsi;

        // Jika ada file gambar yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus file gambar lama jika ada
            if ($dokumen->gambar) {
                Storage::delete($dokumen->gambar);
            }

            // Simpan file gambar baru
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/pdf/', $filename);
            $dokumen->gambar = 'public/pdf/'.$filename;
        }

        $dokumen->save();

        // Notifikasi
        Session::flash('success', 'Postingan berhasil diperbarui.');

        return redirect()->route('admin_postingan');
    }

    // Menghapus postingan
    public function destroy($id)
    {
        $dokumen = Postingan::findOrFail($id);
        $dokumen->delete();

        // Notifikasi
        Session::flash('success', 'Postingan berhasil dihapus.');

        return redirect()->route('admin_postingan');
    }
}

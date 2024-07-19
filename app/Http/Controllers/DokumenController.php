<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    /**
     * Menyimpan dokumen baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  //MENAMPILKAN VIEW USER DOKUMEN
     public function index()
     {
         $dokumen = Dokumen::all();
        
         return view('dokumen', compact('dokumen'));
     }

    // MENAMPILKAN VIEW ADMIN TAMBAH DOKUMEN
    public function tambah_dokumen()
{
   
    return view('admin.tambah_dokumen');
}

    //MENAMPILKAN VIEW EDIT DOKUMEN SESUAI ID
     public function edit($id)
{
    $dokumen = Dokumen::findOrFail($id);
    return view('admin.edit_dokumen', compact('dokumen'));
}

  // MENAMPILKAN SEMUA DATA DOKUMEN DI HALAMAN ADMIN DOKUMEN
     public function admin_dokumen()
     {
        $items = Dokumen::all();
         return view('admin.dokumen', compact('items'));
     }


//TAMBAH DOKUMEN
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'file_path' => 'required|mimes:pdf', // Hanya menerima file PDF maksimum 2MB
            'tanggal_upload' => 'required',
        ]);

        // Upload file ke server
        $file_path = $request->file('file_path')->storeAs('public/pdf', $request->file('file_path')->getClientOriginalName());


        // Buat record baru di database
        $dokumen = new Dokumen();
        $dokumen->nama = $request->nama;
        $dokumen->file_path = $file_path;
        $dokumen->tanggal_upload = $request->tanggal_upload;
        $dokumen->save();
       // session()->flash('success', 'Data berhasil ditambahkan!');
        return redirect()->route('admin_dokumen')
                         ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    // EDIT DOKUMEN
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'file_path' => 'nullable|mimes:pdf', // Ubah sesuai dengan kebutuhan
            'tanggal_upload' => 'required|date',
            
        ]);
    
        $dokumen = Dokumen::findOrFail($id);
        $dokumen->nama = $request->nama;
       // $dokumen->file_path = $request->nama;
        $dokumen->tanggal_upload = $request->tanggal_upload;
        
        if ($request->hasFile('file_path')) {
            // Hapus file lama jika ada
            if ($dokumen->file_path) {
                Storage::delete($dokumen->file_path);
            }
    
            // Simpan file baru
            $file = $request->file('file_path');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/pdf/', $filename);
            $dokumen->file_path = 'public/pdf/'.$filename;
        }
    
    
        $dokumen->save();
    
        // Notifikasi
        Session::flash('success', 'Dokumen berhasil diperbarui.');
    
        return redirect()->route('admin_dokumen');
    }
    
    // DELETE DOKUMEN
    public function destroy($id)
{
    $dokumen = Dokumen::findOrFail($id);
    $dokumen->delete();

    // Notifikasi
    Session::flash('success', 'Dokumen berhasil dihapus.');

    return redirect()->route('admin_dokumen');
}

  
}

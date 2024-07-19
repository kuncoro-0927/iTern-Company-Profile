<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class KarirController extends Controller
{
    /**
     * Menyimpan dokumen baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


//MENAMPILKAN VIEW USER KARIR  
     public function index()
     {
         $karir = Karir::all();
        
         return view('karir', compact('karir'));
     }


// MENAMPILKAN VIEW USER DETAIL KARIR     
     public function show($id)
     {
        
         $detail = karir::find($id);
         return view('detail_karir', compact('detail'));
     }
     
// MENAMPILKAN VIEW TAMBAH KARIR   
public function tambah_karir()
{
   
    return view('admin.tambah_karir');
}

// MENAMPILKAN VIEW EDIT KARIR SESUAI ID     
     public function edit($id)
{
    $karir = Karir::findOrFail($id);
    return view('admin.edit_karir', compact('karir'));
}

// MENAMPILKAN SEMUA DATA KARIR DI HALAMAN ADMIN_KARIR
     public function admin_karir()
     {
        $items = Karir::all();
         return view('admin.karir', compact('items'));
     }


//TAMBAH KARIR
    public function store(Request $request)
    {
        $request->validate([
            'nama_lowongan' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'syarat_ketentuan' => 'required',
            'tahap_rekrutmen' => 'required',
            'formulir' => 'required|mimes:pdf', // Hanya menerima file PDF maksimum 2MB
            'tanggal_upload' => 'required',
        ]);

        // Upload file ke server
        $formulir = $request->file('formulir')->storeAs('public/pdf', $request->file('formulir')->getClientOriginalName());


        // Buat record baru di database
        $karir = new Karir();
        $karir->nama_lowongan = $request->nama_lowongan;
        $karir->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $karir->syarat_ketentuan = $request->syarat_ketentuan;
        $karir->tahap_rekrutmen = $request->tahap_rekrutmen;
        $karir->formulir = $formulir;
        $karir->tanggal_upload = $request->tanggal_upload;
        $karir->save();
        session()->flash('success', 'Data berhasil ditambahkan!');
        return redirect()->route('admin_karir')
                         ->with('success', 'Karir berhasil ditambahkan.');
    }

    // EDIT KARIR
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lowongan' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'syarat_ketentuan' => 'required',
            'tahap_rekrutmen' => 'required',
            'formulir' => 'nullable|mimes:pdf', // Ubah sesuai dengan kebutuhan
            'tanggal_upload' => 'required|date',
            
        ]);
    
        $karir = Karir::findOrFail($id);
        $karir->nama_lowongan = $request->nama_lowongan;
        $karir->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $karir->syarat_ketentuan = $request->syarat_ketentuan;
        $karir->tahap_rekrutmen = $request->tahap_rekrutmen;
       // $dokumen->file_path = $request->nama;
        $karir->tanggal_upload = $request->tanggal_upload;
        
        if ($request->hasFile('formulir')) {
            // Hapus file lama jika ada
            if ($karir->formulir) {
                Storage::delete($karir->formulir);
            }
    
            // Simpan file baru
            $file = $request->file('formulir');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/pdf/', $filename);
            $karir->formulir = 'public/pdf/'.$filename;
        }
    
    
        $karir->save();
    
        // Notifikasi
        Session::flash('success', 'Data Karir berhasil diperbarui.');
    
        return redirect()->route('admin_karir');
    }
    


    // DELETE KARIR
    public function destroy($id)
{
    $dokumen = Karir::findOrFail($id);
    $dokumen->delete();

    // Notifikasi
    Session::flash('success', 'Dokumen berhasil dihapus.');

    return redirect()->route('admin_karir');
}

  
}

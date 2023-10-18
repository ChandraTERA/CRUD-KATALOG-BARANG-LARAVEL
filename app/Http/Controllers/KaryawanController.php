<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{   
    public function index(){
    $karyawan = Karyawan::latest()->get();
    \Log::info('Metode index dipanggil.');
    
    return view('karyawan.index', ['karyawan' => $karyawan]);
}


public function add() {
    return view('karyawan.insert');
}

public function insert(Request $request) {
        
        $id = $request->input('id');
        $nama_produk = $request->input('nama_produk');
        $berat = $request->input('berat');
        $harga = $request->input('harga');
        $kondisi = $request->input('kondisi');
        $keterangan = $request->input('keterangan');
    
        $karyawan = new Karyawan;
        $karyawan->id = $id;
        $karyawan->nama_produk = $nama_produk;
        $karyawan->berat = $berat;
        $karyawan->harga = $harga;
        $karyawan->kondisi= $kondisi;
        $karyawan->keterangan = $keterangan;
        $karyawan->save();
        
        return redirect()->route('karyawan')->with('message', 'Data berhasil ditambahkan');
    }

    public function delete(Request $request, $id) {
            $karyawan = Karyawan::find($id); 
    
            $karyawan ->delete();
            return redirect()->route('karyawan')->with('message', 'Data berhasil dihapus');
    }   

    
    




    

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);

        
        return view('karyawan.edit', compact('karyawan'));
        
    }
    
    public function update(Request $request, $id)
    {
   
        $ubahData = $request->validate([
        
        'nama_produk' => 'required|string',
        'berat' => 'required|string',
        'harga' => 'required|numeric',
        'kondisi => reuquired|string',
        'keterangan' => 'required|string',
    
    
    ]);
    
    $karyawan = Karyawan::find($id);

    $karyawan->nama_produk = $ubahData['nama_produk'];
    $karyawan->berat = $ubahData['berat'];
    $karyawan->harga = $ubahData['harga'];
    $karyawan->kondisi = $ubahData['kondisi'];
    $karyawan->keterangan = $ubahData['keterangan'];
    $karyawan->save();

    return redirect()->route('karyawan')->with('message', 'Data berhasil diperbarui');
}



   
// public function delete(Request $request, $id) {
                
//         $karyawan = $Karyawan ('id');

//         $karyawan->delete();

//         return redirect()->route('karyawan')->with('message', 'Data berhasil di hapus');
//         }
// }


}

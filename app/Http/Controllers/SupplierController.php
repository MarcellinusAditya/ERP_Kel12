<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = DB::table('supplier')->get();
        return view('inventaris.supplier.index', compact('supplier'));
    }

    public function create()
    {
        $supplier = DB::table('supplier')->get();

        return view('inventaris.supplier.tambah', compact('supplier'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required |max:45',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ],
        [
            'name.required' => 'Nama Supplier wajib diisi.',
            'alamat.required' => 'alamat  wajib diisi.',
            'no_telepon.required' => 'no_telepon wajib diisi.',
        ]);

        DB::table('supplier')->insert([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);
        
        return redirect('/supplier')->with('status', 'Supplier Telah Di Tambah!');
    }

    public function edit($id){
        $supplier= Supplier::find($id);
        return view('inventaris.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ],
        [
            'name.required' => 'Nama Supplier wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'no_telepon.required' => 'Nomor Telepon wajib diisi.',
        ]);

        // Mengambil data supplier berdasarkan ID
        $supplier = Supplier::findOrFail($id);

        // Memperbarui data supplier
        $supplier->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect('/supplier')->with('status', 'Supplier telah diedit!');
    }

    public function destroy($id)
    {
        
        // Then delete the supplier
        DB::table('supplier')->where('id', $id)->delete();
        
        return redirect('/supplier')->with('success', 'Supplier berhasil di hapus');
    }

}

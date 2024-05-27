<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class ProductController extends Controller
{
    public function indexHome() //menampilkan data
    {
        $product = DB::table('product')->get();

        // Kemudian Anda dapat mengirimkan data ke tampilan untuk ditampilkan
        return view('inventaris.index', compact('product'));
    }
        public function index() //menampilkan data
    {
        $product = DB::table('product')->get();

        // Kemudian Anda dapat mengirimkan data ke tampilan untuk ditampilkan
        return view('inventaris.tabel.index', compact('product'));
    }

    public function create()
    {
        $product = DB::table('product')->get();

        return view('inventaris.tabel.tambah', compact('product'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required |max:45',
            'initial_price' => 'required|integer|max:99999999', // sesuaikan dengan rentang nilai yang diizinkan
            'selling_price' => 'required|integer|max:99999999', // sesuaikan dengan rentang nilai yang diizinkan
            'stock' => 'required|integer',
            'stock' => 'required|integer',
        ],
        [
            'name.required' => 'Nama barang wajib diisi.',
            'initial_price.required' => 'Harga harus diisi.',
            'initial_price.integer' => 'Harga harus berupa bilangan bulat.',
            'initial_price.max' => 'Harga terlalu besar.',
            'selling_price.required' => 'Harga jual harus diisi.',
            'selling_price.integer' => 'Harga jual harus berupa bilangan bulat.',
            'selling_price.max' => 'Harga jual terlalu besar.',
            'stock.required' => 'Stock harus diisi.',
            'stock.integer' => 'Stock harus berupa bilangan bulat.',
        ]);

         //proses upload foto
         if(!empty($request->image)){
            $fileName = 'image-' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('foto/img'), $fileName);
        } else{
            $fileName = '';
        }

        DB::table('product')->insert([
            'name' => $request->name,
            'initial_price' => $request->initial_price,
            'selling_price' => $request->selling_price,
            'image' => $fileName,
            'stock' => $request->stock,
            'category' => $request->category,
            'barcode' => $request->barcode,
            'description' => $request->description,
        ]);
        
        return redirect('/tabel')->with('status', 'Produk Telah Di Tambah!');
    }

    public function edit($id){
        $product= Product::find($id);
        return view('inventaris.tabel.edit', compact('product'));
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required |max:45',
            'initial_price' => 'required|integer|max:99999999', // sesuaikan dengan rentang nilai yang diizinkan
            'selling_price' => 'required|integer|max:99999999', // sesuaikan dengan rentang nilai yang diizinkan
           
         
        ],
        [
            'name.required' => 'Nama barang wajib diisi.',
            'initial_price.required' => 'Harga harus diisi.',
            'initial_price.integer' => 'Harga harus berupa bilangan bulat.',
            'initial_price.max' => 'Harga terlalu besar.',
            'selling_price.required' => 'Harga jual harus diisi.',
            'selling_price.integer' => 'Harga jual harus berupa bilangan bulat.',
            'selling_price.max' => 'Harga jual terlalu besar.',
            'stock.required' => 'Stock harus diisi.',
            'stock.integer' => 'Stock harus berupa bilangan bulat.',
        ]);
        $product= Product::find($id);
         //proses upload foto
         if(!empty($request->image)){
            $fileName = 'image-' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('foto/img'), $fileName);
        } else{
            $fileName = $product->image;
        }

        // dd($request);
        
        $product->name=$request->input('name');
        $product->initial_price=$request->input('initial_price');
        $product->selling_price=$request->input('selling_price');
        $product->category=$request->input('category');
        $product->barcode=$request->input('barcode');
        $product->image=$fileName;
        $product->description=$request->input('description');
        $product->update();

        return redirect('/tabel');

    }

    
    public function destroy($id)
{
    // First delete related rows in the logs table
    DB::table('logs')->where('product_id', $id)->delete();
    
    // Then delete the product
    DB::table('product')->where('id', $id)->delete();
    
    return redirect('/tabel')->with('success', 'Produk berhasil di hapus');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Log;
use  App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LogsController extends Controller
{
    public function index() //menampilkan data
    {
        
        $logs = Log::get();
        

        // Kemudian Anda dapat mengirimkan data ke tampilan untuk ditampilkan
        return view('inventaris.logs.index', compact('logs'));
    }

    public function create(string $id, string $status)
    {
        $product= Product::find($id);
        $suppliers = Supplier::get();

        return view('inventaris.logs.createlogs', compact('product','status', 'suppliers'));
    }

    public function store(Request $request, string $id) 
    {
        
        
        
        $product= Product::find($id);
        // dd($request);

        if($request->status == 'Out'){
            $request->validate([
                'stock' => 'required|integer',
                'nota' => 'required|max:999',
                'description' => 'required|max:999',
               
            ],
            [
                'stock.required' => 'Stock harus diisi.',
                'stock.integer' => 'Stock harus berupa bilangan bulat.',
            ]);
    
            $finalStock=$product->stock - $request->stock;
        }
        elseif($request->status == 'In'){
            $request->validate([
                'stock' => 'required|integer',
                'nota' => 'required|max:999',
                'description' => 'required|max:999',
                'supplier_id' => 'required'
            ],
            [
                'stock.required' => 'Stock harus diisi.',
                'stock.integer' => 'Stock harus berupa bilangan bulat.',
            ]);
    
            $finalStock=$product->stock + $request->stock;
        }
   
        DB::table('logs')->insert([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'status' => $request->status,
            'stock' => $request->stock,
            'nota' => $request->nota,
            'description' => $request->description,
            'final_stock' => $finalStock,
            'supplier_id' => $request->supplier_id,
            'created_at' => now(),
        ]);

        

        $product->stock=$finalStock;
        $product->update();
        return redirect('/Inventaris');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Log;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;




class ProductAPIController extends Controller
{

        public function index() //menampilkan data
    {
        $product = Product::all();
        
        return response()->json($product);
        
        
    }

    public function show(string $id)
    {
        $product= Product::find($id);
        
        $suppliers = Supplier::get();
        $log=Log::find($id);
        // dd($log->product->name);
        

        return response()->json([
            'data'=>[
                'product'=>$log->product->name
            ]
        ]);
    }
    public function indexlog() //menampilkan data
    {
        $log= Log::with('product')->with('user')->get();
        
        return response()->json([
            'message' => 'success',
            'data'=>$log
        ]);
        
        
    }

}

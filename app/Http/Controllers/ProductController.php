<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Product;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->validate($request, [
            'api_token' => 'required'
        ]);

        $this->middleware('auth');
        
        
    }

    public function product_category()
    {
        // return Product::all();
        return Product::with('category')->get();        
    }
}

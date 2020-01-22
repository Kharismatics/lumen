<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Category;

class CategoryController extends Controller
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

    public function category_products()
    {
        Category::all();
        // $comments = Category::find(1)->products;
        // foreach ($comments as $comment) {
        //     echo $comment;
        // }
        return Category::with('products')->get();     
    }
}

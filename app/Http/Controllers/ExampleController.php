<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Product;
use App\Category;

class ExampleController extends Controller
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

    public function HeaderContent()
    {
        return 1;
    }
    public function model_testing()
    {
        // DB::connection()->enableQueryLog();
        // $phone = Product::find()->category;
        // $queries = DB::getQueryLog();
        // return $queries;
        $comments = Category::find(1)->products;

        foreach ($comments as $comment) {
            //
            echo $comment;
        }
    }
}

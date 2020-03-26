<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Helpers;

// use App\User;
// use App\Category;
// use App\Product;
// use App\Stock;
// use App\Transaction;

class MainController extends Controller
{
    
    
    private 
            $response;

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
    public function main_user()
    {
        return Auth::user();
    }
}

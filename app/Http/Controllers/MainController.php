<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;
use App\Category;
use App\Product;
use App\Stock;
use App\Transaction;

class MainController extends Controller
{
    
    
    private 
            $name,
            $email;

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
    // ==================== User
    public function user_transactions()
    {
        // return User::all();
        return User::with('transactions')->get();        
    }
    // ==================== Category
    public function category_products()
    {
        // return Category::all();
        // $comments = Category::find(1)->products;
        // foreach ($comments as $comment) {
        //     echo $comment;
        // }
        return Category::with('products')->get();     
    }
    // ==================== Product
    public function product_category()
    {
        return Product::with('category')->get();        
    }
    public function product_stocks()
    {
        return Product::with('stocks')->get();        
    }
    public function product_transactions()
    {
        return Product::with('transactions')->get();        
    }
    // ==================== Product
    public function stock_product()
    {
        // return Stock::all();
        // $comments = Stock::find(1)->products;
        // foreach ($comments as $comment) {
        //     echo $comment;
        // }
        return Stock::with('product')->get();     
    }
    // ==================== Transaction
    public function transaction_best_product()
    {
        $data =     DB::table('transactions')
                     ->select(DB::raw('count(id) as num'))
                     ->groupBy('product_id')
                     ->get();
        return $data;
    }
}

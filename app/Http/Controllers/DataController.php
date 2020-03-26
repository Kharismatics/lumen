<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use MyFunctions;

// use App\User;
// use App\Category;
// use App\Product;
// use App\Stock;
// use App\Transaction;

class DataController extends Controller
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
    public function upcoming_orders()
    {
        $data = DB::table('transactions')
                ->select( DB::raw('count(transactions.id) as aggregate') )
                ->where('transactions.created_by', Auth::user()->id)
                ->where('transactions.transaction_status', 1)
                ->get();
        return $data;
    }
    public function inprogress_orders()
    {
        $data = DB::table('transactions')
                ->select( DB::raw('count(transactions.id) as aggregate') )
                ->where('transactions.created_by', Auth::user()->id)
                ->where('transactions.transaction_status', 2)
                ->get();
        return $data;
    }
    public function completed_orders()
    {
        $data = DB::table('transactions')
                ->select( DB::raw('count(transactions.id) as aggregate') )
                ->where('transactions.created_by', Auth::user()->id)
                ->where('transactions.transaction_status', 3)
                ->get();
        return $data;
    }
    public function total_orders()
    {
        $data = DB::table('transactions')
                ->select( DB::raw('count(transactions.id) as aggregate') )
                ->where('transactions.created_by', Auth::user()->id)
                ->get();
        return $data;
    }
    public function total_products()
    {
        $data = DB::table('products')
                ->select( DB::raw('count(id) as aggregate') )
                ->where('created_by', Auth::user()->id)
                ->get();
        return $data;
    }
    public function total_categories()
    {
        $data = DB::table('categories')
                ->select( DB::raw('count(id) as aggregate') )
                ->where('created_by', Auth::user()->id)
                ->get();
        return $data;
    }
    public function total_customers()
    {
        $data = DB::table('users')
                ->select( DB::raw('count(id) as aggregate') )
                ->where('created_by', Auth::user()->id)
                ->get();
        return $data;
    }
    public function total_stocks()
    {
        $data = DB::table('stocks')
                ->select( DB::raw('SUM(IF(in_out=1,quantity,-quantity)) as aggregate') )
                ->where('created_by', Auth::user()->id)
                ->get();
        return $data;
    }
    public function best_product_chart()
    {
        $data = DB::table('transactions')
                ->join('products', 'products.id', '=', 'transactions.product_id')
                ->select('products.name', DB::raw('count(products.id) as aggregate'))
                ->where('transactions.created_by', Auth::user()->id)
                ->where('transactions.transaction_status', 3)
                ->groupBy('product_id')
                ->orderBy('aggregate', 'desc')
                ->get();
        return Helpers::Chart_js($data);
    }
    public function best_customer_chart()
    {
        $data = DB::table('transactions')
                ->join('users', 'users.id', '=', 'transactions.user_id')
                ->select('users.name', DB::raw('count(users.id) as aggregate'))
                ->where('transactions.created_by', Auth::user()->id)
                ->where('transactions.transaction_status', 3)
                ->groupBy('user_id')
                ->orderBy('aggregate', 'desc')
                ->get();
        return Helpers::Chart_js($data);
    }
    public function sales_byprice_chart()
    {
        
        $data = DB::table('transactions')
        ->join('products', 'products.id', '=', 'transactions.product_id')
        ->select(DB::raw('YEAR(transactions.transaction_date) year, MONTH(transactions.transaction_date) month,DATE_FORMAT(transactions.transaction_date,"%Y %b") AS name, SUM(products.price * transactions.quantity) AS aggregate'))
        ->where('transactions.created_by', Auth::user()->id)
        ->where('transactions.transaction_status', 3)
        ->groupBy('year','month')
        ->orderByRaw('year,month')
        ->get();
        return Helpers::Chart_js($data);
    }
    public function sales_byquantity_chart()
    {
        
        $data = DB::table('transactions')
        ->join('products', 'products.id', '=', 'transactions.product_id')
        ->select(DB::raw('YEAR(transactions.transaction_date) year, MONTH(transactions.transaction_date) month,DATE_FORMAT(transactions.transaction_date,"%Y %b") AS name, SUM(transactions.quantity) AS aggregate'))
        ->where('transactions.created_by', Auth::user()->id)
        ->where('transactions.transaction_status', 3)
        ->groupBy('year','month')
        ->orderByRaw('year,month')
        ->get();
        return Helpers::Chart_js($data);
    }
    public function budget_x_sales()
    {
        $label = DB::select("SELECT DATE_FORMAT(dates,'%Y %b') AS dates , 0 AS result FROM ( SELECT @date := DATE_ADD(@date, INTERVAL 1 DAY) AS dates FROM mysql.help_relation , ( SELECT @date:= DATE_SUB('2018-01-01', INTERVAL 1 DAY)) d WHERE @date BETWEEN @date AND DATE_SUB('2018-12-31', INTERVAL 1 DAY ) ) a GROUP BY YEAR(a.dates), MONTH(a.dates) ORDER BY YEAR(a.dates), MONTH(a.dates)");
        $data = DB::select('SELECT 
                            DATE_FORMAT(a.created_at,"%Y %b") dates,
                            IF(a.in_out=1,"IN","OUT") `name`,
                            IF(a.in_out=1,SUM(b.base_price*a.quantity),SUM(b.price*a.quantity)) result
                            FROM `stocks` a
                            JOIN products b ON a.product_id = b.id  
                            WHERE a.created_at BETWEEN "2018-01-01" AND "2018-04-31"
                            GROUP BY YEAR(a.created_at), MONTH(a.created_at),a.in_out ORDER BY YEAR(a.created_at), MONTH(a.created_at),a.in_out');
        if ($data) {
            return MyFunctions::Chart_js_multiaxis_bymonth($label,$data); 
        }
    }
    public function in_out_stocks_chart()
    {
        $label = DB::select("SELECT DATE_FORMAT(dates,'%Y %b') AS dates , 0 AS `in`, 0 AS `out` FROM ( SELECT @date := DATE_ADD(@date, INTERVAL 1 DAY) AS dates FROM mysql.help_relation , ( SELECT @date:= DATE_SUB('2018-01-01', INTERVAL 1 DAY)) d WHERE @date BETWEEN @date AND DATE_SUB('2018-12-31', INTERVAL 1 DAY ) ) a GROUP BY YEAR(a.dates), MONTH(a.dates) ORDER BY YEAR(a.dates), MONTH(a.dates)");
        $data = DB::select('SELECT 
                            DATE_FORMAT(a.created_at,"%Y %b") dates,
                            b.name,
                            SUM(IF(a.in_out=1,a.quantity,0)) `in`, 
                            SUM(IF(a.in_out=2,a.quantity,0)) `out` 
                            FROM `stocks` a
                            JOIN products b on a.product_id = b.id  
                            GROUP BY YEAR(a.created_at), MONTH(a.created_at),a.product_id ORDER BY YEAR(a.created_at), MONTH(a.created_at),a.product_id');
        if ($data) {
            return Helpers::Chart_js_multiaxis_bymonth_custom($label,$data); 
        }
    }
}

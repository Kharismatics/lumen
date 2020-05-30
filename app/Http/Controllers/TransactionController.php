<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Transaction;
use App\User;
use App\Product;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private 
            $validate = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
                'password' => 'required',
                'api_token' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ],
            $response ;

    public function __construct(Request $request)
    {
        $this->validate($request, [
            'api_token' => 'required'
        ]);

        $this->middleware('auth');

        $this->response = 'failed';           
    }
    // Resource Controller
    public function index()
    {
        // return Transaction::all();
        return Transaction::with(['user','product'])->get(); 
    }
    public function show(Request $request)
    {
        return Transaction::find($request->id);
    }
    public function edit(Request $request)
    {
        $row = Transaction::find($request->id);
        $users = User::orderBy('name', 'DESC')->get();
        $products = Product::orderBy('name', 'DESC')->get();
        return view('transactions.edit', compact('row', 'users', 'products'));
    }
    public function store(Request $request)
    {
        $data = new Transaction;

        $data->product_id = $request->product_id;
        $data->user_id = $request->user_id;
        $data->transaction_date = $request->transaction_date;
        $data->quantity = $request->quantity;
        $data->discount = $request->discount;
        $data->shipping_cost = $request->shipping_cost;
        $data->description = $request->description;
        $data->remark = $request->remark;
        $data->transaction_status = $request->transaction_status;
        $data = $data->save();
        if ($data) {
            $this->response = 'success';
        }
        return $this->response;
    }
    public function update(Request $request)
    {
        $data = Transaction::find($request->id);
        if ($data) {
            $data->product_id = $request->product_id;
            $data->user_id = $request->user_id;
            $data->transaction_date = $request->transaction_date;
            $data->quantity = $request->quantity;
            $data->discount = $request->discount;
            $data->shipping_cost = $request->shipping_cost;
            $data->description = $request->description;
            $data->remark = $request->remark;
            $data->transaction_status = $request->transaction_status;
            $data = $data->save() ;
            $this->response = 'success';
        } 
        return $this->response;
    }
    public function destroy(Request $request)
    {
        $data = Transaction::find($request->id);
        if ($data) {
            $data = $data->delete();
            $this->response = 'success';
        }
        return $this->response;
    }
    // Resource Controller End
}

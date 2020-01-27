<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private 
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
        return Transaction::all();
    }
    public function show(Request $request)
    {
        return Transaction::find($request->id);
    }
    public function store(Request $request)
    {
        $data = new Transaction;

        $data->product_id = $request->product_id;
        $data->user_id = $request->user_id;
        $data->transaction_date = $request->transaction_date;
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
    public function delete(Request $request)
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

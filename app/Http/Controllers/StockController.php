<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Stock;

class StockController extends Controller
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
        return Stock::all();
    }
    public function show(Request $request)
    {
        return Stock::find($request->id);
    }
    public function store(Request $request)
    {
        $data = new Stock;

        $data->product_id = $request->product_id;
        $data->quantity = $request->quantity;
        $data = $data->save();
        if ($data) {
            $this->response = 'success';
        }
        return $this->response;
    }
    public function update(Request $request)
    {
        $data = Stock::find($request->id);
        if ($data) {
            $data->product_id = $request->product_id;
            $data->quantity = $request->quantity;
            $data = $data->save() ;
            $this->response = 'success';
        } 
        return $this->response;
    }
    public function delete(Request $request)
    {
        $data = Stock::find($request->id);
        if ($data) {
            $data = $data->delete();
            $this->response = 'success';
        }
        return $this->response;
    }
    // Resource Controller End
}

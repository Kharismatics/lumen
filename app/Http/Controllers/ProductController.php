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
        return Product::all();
    }
    public function show(Request $request)
    {
        return Product::find($request->id);
    }
    public function store(Request $request)
    {
        $data = new Product;

        $data->category_id = $request->category_id;
        $data->unique_code = $request->unique_code;
        $data->name = $request->name;
        $data->base_price = $request->base_price;
        $data->price = $request->price;
        $data->description = $request->description;
        $data = $data->save();
        if ($data) {
            $this->response = 'success';
        }
        return $this->response;
    }
    public function update(Request $request)
    {
        $data = Product::find($request->id);
        if ($data) {
            $data->category_id = $request->category_id;
            $data->unique_code = $request->unique_code;
            $data->name = $request->name;
            $data->base_price = $request->base_price;
            $data->price = $request->price;
            $data->description = $request->description;
            $data = $data->save() ;
            $this->response = 'success';
        } 
        return $this->response;
    }
    public function delete(Request $request)
    {
        $data = Product::find($request->id);
        if ($data) {
            $data = $data->delete();
            $this->response = 'success';
        }
        return $this->response;
    }
    // Resource Controller End
}

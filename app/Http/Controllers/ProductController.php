<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private 
            $validate = [
                'unique_code' => 'required|unique:products,unique_code',
                'name' => 'required',
                'base_price' => 'required',
                'price' => 'required',
                'description' => 'required',
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
        // return Product::all();
        return Product::with('category')->get(); 
    }
    public function show(Request $request)
    {
        return Product::find($request->id);
    }
    public function edit(Request $request)
    {
        $row = Product::find($request->id);
        $categories = Category::orderBy('name', 'DESC')->get();
        return view('products.edit', compact('row', 'categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, $this->validate);
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
        $this->validate['unique_code'] = ['unique_code' => 'unique:products,unique_code,'.$request->id];        
        $this->validate($request, $this->validate);

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
    public function destroy(Request $request)
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

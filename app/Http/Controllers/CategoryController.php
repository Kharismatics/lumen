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

     private 
            $validate = [
                'name' => 'required|name|unique:categories,name,NULL,id,deleted_at,NULL',
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
        return Category::all();
    }
    public function show(Request $request)
    {
        return Category::find($request->id);
    }
    public function store(Request $request)
    {
        $this->validate($request, $this->validate);
        $data = new Category;

        $data->name = $request->name;
        $data->description = $request->description;
        $data = $data->save();
        if ($data) {
            $this->response = 'success';
        }
        return $this->response;
    }
    public function update(Request $request)
    {
        $this->validate($request, $this->validate);
        $data = Category::find($request->id);
        if ($data) {
            $data->name = $request->name;
            $data->description = $request->description;
            $data = $data->save() ;
            $this->response = 'success';
        } 
        return $this->response;
    }
    public function delete(Request $request)
    {
        $data = Category::find($request->id);
        if ($data) {
            $data = $data->delete();
            $this->response = 'success';
        }
        return $this->response;
    }
    // Resource Controller End
}

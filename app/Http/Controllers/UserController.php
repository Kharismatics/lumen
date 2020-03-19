<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Str;

class UserController extends Controller
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
        // return User::all();
        return User::where('id', '!=', Auth::user()->id)->get();
    }
    public function show(Request $request)
    {
        return User::find($request->id);
    }
    public function store(Request $request)
    {
        $this->validate($request, $this->validate);
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->api_token = base64_encode(Str::random(40));
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data = $data->save();
        if ($data) {
            $this->response = 'success';
        }
        return $this->response;
    }
    public function update(Request $request)
    {
        $this->validate($request, $this->validate);
        $data = User::find($request->id);
        if ($data) {
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = $request->password;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data = $data->save() ;
            $this->response = 'success';
        } 
        return $this->response;
    }
    public function delete(Request $request)
    {
        $data = User::find($request->id);
        if ($data) {
            $data = $data->delete();
            $this->response = 'success';
        }
        return $this->response;
    }
    // Resource Controller End
}

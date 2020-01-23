<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\User;

class UserController extends Controller
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

    public function user_transactions()
    {
        // return User::all();
        return User::with('transactions')->get();        
    }
}

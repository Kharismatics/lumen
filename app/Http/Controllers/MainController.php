<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

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

    public function user()
    {
        return Auth::user();
    }
}

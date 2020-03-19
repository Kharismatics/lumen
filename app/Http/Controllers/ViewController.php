<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function form(Request $request)
    {
        // $columns = array("created_by","updated_by","created_at","updated_at","deleted_at");
        // $data = DB::getSchemaBuilder()->getColumnListing($request->table);
        // $field = array_diff($data, $columns);
        // if ($request->mode=='add') {
        //     unset($field[0]);
        //     $field = array_values($field);
        // }
        $columns = array("created_by","updated_by","created_at","updated_at","deleted_at");
        $data = DB::getSchemaBuilder()->getColumnListing($request->table);
        $field = array_diff($data, $columns);
        unset($field[0]);
        $field = array_values($field);
        return $field;
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function users()
    {
        return view('users');
    }
}
<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function testconnection()
    {
        // return 'tes';
        $query="SELECT * from user ";
        $result = app('db')->select($query);
        return $result;
    }
}

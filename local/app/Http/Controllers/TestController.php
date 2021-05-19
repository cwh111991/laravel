<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function __construct()
    {
        //$this->middleware('test');

        //$this->middleware('test')->only('show');

        $this->middleware('test')->except('show1');
    }

    //
    public function show($id){
        return $id;
    }


    public function show1($id){
        return $id;
    }
}

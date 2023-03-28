<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function access_denied(){
        return view('Components.403');
    }
}

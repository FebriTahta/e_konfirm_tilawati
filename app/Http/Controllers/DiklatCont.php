<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiklatCont extends Controller
{
    public function index()
    {
        return view('diklat.index');
    }
}

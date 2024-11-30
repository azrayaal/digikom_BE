<?php

namespace App\Http\Controllers;


//import model product

//import return type View
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index() : View
    {
        //render view with products
        return view('index');
    }
}

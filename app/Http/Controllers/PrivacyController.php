<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

//import return type View
use Illuminate\View\View;

class PrivacyController extends Controller
{
    public function privacy() : View
    {
        return view('pages.privacy.privacy');
    }
    public function remove() : View
    {
        return view('pages.privacy.remove');
    }
    public function show() : View
    {
        return view('pages.privacy.show');
    }
}

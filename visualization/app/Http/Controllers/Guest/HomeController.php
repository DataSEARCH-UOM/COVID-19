<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //

    public function index(Request $request){

        return view('guest.dashboard');
    }
}

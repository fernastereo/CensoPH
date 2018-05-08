<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Property;
use App\Habitant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('id', Auth::user()->property_id)->get();
        return view('home', ['properties' => $properties]);
    }
}

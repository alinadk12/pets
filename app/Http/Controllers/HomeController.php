<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function change_lang()
    {
        if (App::isLocale('en')) {
            \Session::put('language', 'ru');
        } else {
            \Session::put('language', 'en');
        }

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($lang)
    {
        if (!in_array($lang, config('lang.locale'))) {
            return redirect()->back();
        } else {
            session()->put('lang', $lang);

            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($lang)
    { 
    	if (!in_array($lang, ['en', 'vi'])) {

            return redirect()->back();
        } else {
        	session()->put('lang',$lang);

        	return redirect()->back();
        }
    }
}

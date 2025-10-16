<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sampleController extends Controller
{
        public function index()
        {
            return view('sample');
        }
        public function about()
        {
            return view('about');
        }
        public function contact()
        {
            return view('contact');
        }
}

<?php

namespace App\Http\Controllers\forntEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class forntendController extends Controller
{
    public function index(){
        return View('fornttent.home');
    }
}

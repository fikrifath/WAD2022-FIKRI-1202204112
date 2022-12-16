<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom;

class HomeController extends Controller
{
    public function index()
    {
        $showroom = Showroom::all();
        $jmlData = count($showroom);

        return view('index', compact('jmlData'));
    }
}

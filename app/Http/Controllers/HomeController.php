<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Gejala;
use App\Models\Stunting;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'gejala_count' => count(Gejala::get()),
            'stunting_count' => count(Stunting::get()),
            'bobot_count' => count(Bobot::get()),
        ]);
    }
}

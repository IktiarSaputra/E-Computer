<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Location;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $active = Computer::where('condition', "Hidup")->get()->count();
        $repair = Computer::where('condition', "Sedang DiPerbaiki")->get()->count();
        $off = Computer::where('condition', "Mati")->get()->count();
        $computer = Computer::orderBy('created_at', 'DESC')->paginate()->take(6);
        $location = Location::orderBy('created_at','DESC')->get();
        return view('user.dashboard',compact('active','repair','off','computer','location'));
    }
}

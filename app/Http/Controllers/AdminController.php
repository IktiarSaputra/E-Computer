<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Location;

class AdminController extends Controller
{
    public function index()
    {
        $active = Computer::where('condition', "Hidup")->get()->count();
        $repair = Computer::where('condition', "Sedang DiPerbaiki")->get()->count();
        $off = Computer::where('condition', "Mati")->get()->count();
        $computer = Computer::orderBy('created_at', 'DESC')->paginate()->take(6);
        $location = Location::orderBy('created_at','DESC')->get();
        return view('admin.dashboard',compact('active','repair','off','computer','location'));
    }
}

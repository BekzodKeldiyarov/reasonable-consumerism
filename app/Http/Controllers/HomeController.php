<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\Good;
use App\Models\Meat;
use App\Models\Package;
use App\Models\Plastic;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function dashboard()
    {

        return view('admin.index', ['bottles' => Bottle::all(), 'packages' => Package::all(), 'goods' => Good::all(), 'plastics' => Plastic::all(), 'meats' => Meat::all()]);
    }
}

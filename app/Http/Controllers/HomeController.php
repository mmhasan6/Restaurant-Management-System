<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodChef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
      $foodmenu = Food::all();
      $chef = FoodChef::all();
      return view('home', compact('foodmenu', 'chef'));
    }

    public function redirects()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.adminhome');
        }
        else{
          $foodmenu = Food::all();
          $chef = FoodChef::all();
          return view('home', compact('foodmenu', 'chef'));
        }
    }
}

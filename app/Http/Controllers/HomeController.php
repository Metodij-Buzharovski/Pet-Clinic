<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view("index",[
            'petCount' => count(Pet::all()),
            'userCount' => count(User::all()->where('role', 'client'))
        ]);
    }
}

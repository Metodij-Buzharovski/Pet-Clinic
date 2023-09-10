<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() {
        return view("pets.index",[
            'pets' => Pet::all()
        ]);
    }

    public function create() {
        return view('pets.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'weight' => 'required',
        ]);

        Pet::create($formFields);

        return redirect('/pets');
    }
}

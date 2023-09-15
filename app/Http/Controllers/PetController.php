<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'client') {
            $pets = Pet::all()->where('user_id', auth()->id());
        } else {
            $pets = Pet::latest()->filter(request(['search']))->get();
        }
        return view("pets.index", [
            'pets' => $pets
        ]);
    }

    public function create()
    {
        return view('pets.create',[
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'weight' => 'required',
        ]);

        if(auth()->user()->role=='client'){
            $formFields['user_id'] = auth()->id();
        }


        Pet::create($formFields);

        return redirect('/pets');
    }

    private function clientsPetOnly(Pet $pet): bool{
        if((auth()->user()->role!='client') || (auth()->id() == $pet->user_id)){
            return true;
        }
            return false;
    }

    public function edit(Pet $pet) {
        if($this->clientsPetOnly($pet)){
            return view('pets.edit', ['pet' => $pet]);
        }
        else{
            abort(403,'THIS ACTION IS UNAUTHORIZED');
        }
        return view('pets.edit', ['pet' => $pet]);
    }

    public function update(Request $request, Pet $pet) {
        if($this->clientsPetOnly($pet)){
            $formFields = $request->validate([
                'name' => 'required',
                'breed' => 'required',
                'age' => 'required',
                'weight' => 'required',
            ]);

            $pet->update($formFields);

            return redirect('/pets');
        }
        else{
            abort(403,'THIS ACTION IS UNAUTHORIZED');
        }
    }

    public function destroy(Pet $pet)
    {
        $this->authorize('medicalPersonelOnly', auth()->user());
        $pet->delete();
        return redirect('/pets');
    }
}

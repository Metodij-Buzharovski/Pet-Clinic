<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Pet;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index(Pet $pet) {
        return view('records.index',[
            'records'=> $pet->medicalRecords()->get(),
            'pet_id' =>$pet->id
        ]);
    }

    public function create(Pet $pet) {
        return view('records.create',[
            'pet_id' => $pet->id
        ]);
    }

    public function store(Request $request, Pet $pet) {
        $formFields = $request->validate([
            'diagnosis' => 'required',
            'treatment' => 'required',
        ]);

        $formFields['pet_id'] = $pet->id;
        $formFields['date'] = date("Y-m-d");

        MedicalRecord::create($formFields);

        return redirect('/records/' . $pet->id);
    }
}

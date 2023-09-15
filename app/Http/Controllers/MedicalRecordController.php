<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Pet;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index(Pet $pet) {
        if($this->clientsPetOnly($pet)){
            return view('records.index',[
                'records'=> $pet->medicalRecords()->get(),
                'pet_id' =>$pet->id
            ]);
        }
        else{
            abort(403,'THIS ACTION IS UNAUTHORIZED');
        }
    }

    public function create(Pet $pet) {
        $this->authorize('adminAndDoctorOnly', auth()->user());

        return view('records.create',[
            'pet_id' => $pet->id
        ]);
    }

    public function store(Request $request, Pet $pet) {
        $this->authorize('adminAndDoctorOnly', auth()->user());
        $formFields = $request->validate([
            'diagnosis' => 'required',
            'treatment' => 'required',
        ]);

        $formFields['pet_id'] = $pet->id;
        $formFields['date'] = date("Y-m-d");

        MedicalRecord::create($formFields);

        return redirect('/records/' . $pet->id);
    }

    private function clientsPetOnly(Pet $pet): bool{
        if((auth()->user()->role!='client') || (auth()->id() == $pet->user_id)){
            return true;
        }
        return false;
    }
}

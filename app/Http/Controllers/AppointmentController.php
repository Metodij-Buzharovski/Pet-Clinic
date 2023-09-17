<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index() {
        $ldate = date('Y-m-d');
        if (auth()->user()->role == 'client') {
            $pets = auth()->user()->pets;
            foreach ($pets as $pet){
                $temp[] = Appointment::all()->where('pet_id', $pet->id)->where('date', '>=', $ldate);

            }
            foreach ($temp as $x){
                foreach ($x as $y){
                    $appointments[] = $y;
                }
            }
        }
        else if (auth()->user()->role == 'doctor') {
            $temp = Appointment::all()->sortBy('date');
            $appointments = $temp->where('doctor_id', auth()->id())->where('date', '>=', $ldate);
        }
        else {
            $appointments = Appointment::all()->where('date', '>=', $ldate)->sortBy('date');
        }
        return view("appointments.index",[
            'appointments' => $appointments
        ]);
    }

    public function create() {
        if(auth()->user()->role == 'doctor'){
            $pets = Pet::all();
            $doctors = User::all()->where('id', auth()->id());
        }
        else if (auth()->user()->role == 'client') {
            $pets = Pet::all()->where('user_id', auth()->id());
            $doctors = User::all()->where('role', 'doctor');
        }
        else{
            $pets = Pet::all();
            $doctors = User::all()->where('role', 'doctor');
        }
        return view('appointments.create',[
            'pets' => $pets,
            'doctors' => $doctors
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'pet_id' => 'required',
            'visit_reason' => 'required',
            'doctor_id' => 'required',
            'date' => 'required'
        ]);

        Appointment::create($formFields);

        return redirect('/appointments');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        return view("users.index", [
            'users' => User::all()->where('role', 'client')
        ]);
    }

    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['role']='client';
        User::create($formFields);

        return redirect('/users');
    }



    public function staff() {
        return view("staff.index", [
            'staff' => User::all()->whereIn('role', array('admin','doctor','assistant'))
        ]);
    }

    public function createStaff() {
        return view('staff.create');
    }

    public function storeStaff(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);

        User::create($formFields);

        return redirect('/staff');
    }
}

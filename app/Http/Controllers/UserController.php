<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        return view("users.index", [
            'users' => User::latest()->where('role', 'client')->filter(request(['search']))->get()
        ]);
    }

    public function create() {
        if(Auth::check()==false){
            return view('auth.register');
        }
        else{
            return view('users.create');
        }
    }

    public function store(Request $request) {
        if(Auth::check()==false){
            $formFields = $request->validate([
                'name' => ['required', 'min:2'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|min:4'
            ]);
        }
        else{
            $formFields = $request->validate([
                'name' => ['required', 'min:2'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|min:4'
            ]);
        }


        $formFields['role']='client';
        $user = User::create($formFields);

        if(Auth::check()==false){
            auth()->login($user);

            return redirect('/');
        }
        else{
            return redirect('/users');
        }
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }



    public function staff() {
        $this->authorize('medicalPersonelOnly', auth()->user());
        return view("staff.index", [
            'staff' => User::latest()->whereIn('role', array('admin','doctor','assistant'))->filter(request(['search']))->get()
        ]);
    }

    public function createStaff() {
        $this->authorize('adminOnly', auth()->user());
        return view('staff.create');
    }

    public function storeStaff(Request $request) {
        $this->authorize('adminOnly', auth()->user());
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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DevController extends Controller
{
    public function log($role)
    {
        $user = User::where('role', $role)->where('email', 'pentadbir@gmail.com')->first();
        Auth::login($user);
        return redirect('/dashboard');

    }

    public function index()
    {
        return view('devlogin');
    }
}

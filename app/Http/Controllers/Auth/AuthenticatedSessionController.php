<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Audit;
use App\Models\PRUSER;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // $useroracle = Oracle::all();

        // dd($useroracle);

        // setup audit trail

        $user = $request->user();
        $audit = new Audit;
        $audit->user_id = $user->id;
        $audit->name = $user->name;
        $audit->peranan = $user->role;

        $audit->description = 'Log Masuk';

        $audit->save();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = $request->user();
        $audit = new Audit;
        $audit->user_id = $user->id;
        $audit->name = $user->name;
        $audit->peranan = $user->role;

        $audit->description = 'Log Keluar';
        $audit->save();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function new_store(LoginRequest $request)
    {
        // dd(md5("P@ssw0rd"), md5("password1"));
        $password = md5($request->password);
        $user = User::where('password', $password)
            ->where('nric', $request->nric)
            ->first();
        if ($user == null) {
            $user = PRUSER::where('USERPASSWORD', $password)
                ->where('nric', $request->nric)
                ->first();
        }

        if ($user == null) {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        Auth::login($user);
        return redirect('/dashboard');
    }
}

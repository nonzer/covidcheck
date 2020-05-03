<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockAccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function lockscreen(){
        session(['locked' => 'true']);

        return view('auth.lockscreen');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function unlock(Request $request){
        $this->validate($request, [
            'password' => 'required|string'
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            $request->session()->forget('locked');

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['password' => 'Mot de passe ne correspond pas. Veuillez réessayer.']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function home()
    {
        return "home";
    }

    public function getProfile()
    {
        return view('template.profile');
    }

    public function getLogin()
    {
        return view('template.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->except('_token');
        if (Auth::guard('admins')->attempt($data)) {
            return redirect()->route('get.home');
        }

        return redirect()->back();
    }
    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

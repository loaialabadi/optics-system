<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

 
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'بيانات الدخول غير صحيحة');
    }

    // تسجيل الدخول باستخدام Laravel Auth
    Auth::login($user);
    // توجيه حسب الدور
    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.dashboard.index');
        case 'branch':
            return redirect()->route('branch.dashboard.index');
        case 'workshop':
            return redirect()->route('workshop.dashboard.index');
    }
}
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

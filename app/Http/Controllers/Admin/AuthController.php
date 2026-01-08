<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        // Field Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
    
        //Insert data
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $adminData = Admin::create($data);
            Auth::guard('admin')->login($adminData);

            return redirect()->route('admin.dashboard');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if(Auth::guard('admin')->attempt($credentials)) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->back()->with('error', 'Invalid credentials.');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function dashboard()
    {
        $admins = Admin::orderBy('created_at', 'asc')->get();
        $customers = Customer::orderBy('created_at', 'asc')->get();

        return view('admin.dashboard', compact('admins', 'customers'));
    }

    public function logout()
    {
        try {
            $adminId = Auth::guard('admin')->check() ? Auth('admin')->user()->id : '' ;
            $admin = Admin::find($adminId);
            if(!is_null($admin)) {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('success', 'You have been Logged out. See you soon.');
            } else {
                return redirect()->back()->with('error', 'Unable to logout.');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }
}

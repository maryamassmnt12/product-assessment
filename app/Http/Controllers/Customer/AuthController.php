<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Hash;
use Auth;

class AuthController extends Controller
{
    //Register functions
    public function showRegister()
    {
        return view('customer.auth.register');
    }

    public function register(Request $request)
    {
        // Field Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
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
            $customerData = Customer::create($data);
            Auth::guard('customer')->login($customerData);

            return redirect()->route('customer.dashboard');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    //Login functions
    public function showLogin()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if(Auth::guard('customer')->attempt($credentials)) {
                return redirect()->intended(route('customer.dashboard'));
            }

            return redirect()->back()->with('error', 'Invalid credentials.');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    //Dashboard function
    public function dashboard()
    {
        return view('customer.dashboard');
    }

    //Logout function
    public function logout()
    {
        try {
            $customerId = Auth::guard('customer')->check() ? Auth('customer')->user()->id : '' ;
            $customer = Customer::find($customerId);
            if(!is_null($customer)) {
                Auth::guard('customer')->logout();
                return redirect()->to('/')->with('success', 'You have been Logged out. See you soon.');
            } else {
                return redirect()->back()->with('error', 'Unable to logout.');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

}

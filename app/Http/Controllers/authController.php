<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class authController extends Controller
{
    // login 
    public function login(){ 
        return view('login'); 
    }

    // post method for login 
    public function postLogin(Request $request){ 
        
        // validate 
        $request->validate([
            'email' => 'required|email', 
            'password' => 'required'
        ]); 

        // checking user exists or not
        $user = "";     
        try{ 
            $user = User::where('email', $request->email)->first();         
            
            if(!$user) { 
                $request->session()->flash('error', "Invalid Credentials"); 
                return redirect()->back(); 
            }
        }catch(\Exception $e){ 
            $request->session()->flash('error', "Something went wrong"); 
            return redirect()->back(); 
        }


        // compare the hash

        $check = Hash::check($request->password, $user->password); 

        if(!$check){ 
            $request->session()->flash('error', 'Password didnt matched'); 
            return redirect()->back(); 
        }


        $request->session()->put('isLoggedIn', true); 
        $request->session()->put('userId', $user->id); 
        $request->session()->put('username', $user->username); 
        $request->session()->put('email', $user->email); 

        return redirect('/'); 

    }


    // logout

    public function logout(Request $request, Closure $next){ 
        $request->session()->pull('isLoggedIn'); 
        $request->session()->pull('userId'); 
        $request->session()->pull('username'); 
        $request->session()->pull('email'); 


        $response = $next($request);
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
        $response->header('Cache-Control', 'no-cache, must-revalidate, no-store, max-age=0, private');


        return redirect('/login'); 
    }
}

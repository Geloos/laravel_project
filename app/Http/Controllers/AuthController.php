<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{

    public function singin(){
        
        return view('singin');

    }

    public function singin_user(Request $request){

        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|min:8|'
        ]);
        
        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                
                $request->session()->put('loginId',$user->id);
                return redirect(route('home'));
            
            }else
                return back()->with('error', 'Password is not correct');
            
        }else
            return back()->with('error', 'Email does not exist');


    }

    public function singup(){
 
        return view('singup');

    }

    public function singup_user(Request $request){
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

        return redirect(route('authentication.singin'));

    }


    public function logout(){
        
        Session::flush();
        Session::regenerate();
        return redirect(route('authentication.singin'));

    }

}

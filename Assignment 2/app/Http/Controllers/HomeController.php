<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index()
    {
        $users=User::all();
        $adoptions = Adoption::latest()->unadopted()->get();
        return view('adoptions.list', ['adoptions' => $adoptions, 'header' => 'Available for adoption'],["users"=>$users]);
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 3 Guest, step 5. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
        $user=$request->validate([

            'email'=>['required','email'],
            'password'=>['required']
        ]);
        Auth::attempt($user);
        return redirect()->route('home');
    }

    public function register()
    {

        return view('register');
    }

    public function doRegister(Request $request)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 2 Guest, step 5. You should implement this method as instructed done
        |-----------------------------------------------------------------------
        */
        $request->validate([
        'name'=>['required','string','max:255'],
        'email'=>['required','string','email','max:255','unique:users'],
        'password'=>['required','confirmed']
        ]);
     $user=User::create([
         'name'=>$request->name,
         'email'=>$request->email,
         'password'=>Hash::make($request->password),
     ]);
     $user->save();
//     event(new Registered($user));
     Auth::login($user);
     return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 2 User, step 3. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}

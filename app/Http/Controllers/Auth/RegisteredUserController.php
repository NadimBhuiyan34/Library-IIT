<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Mail\SendMail;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }
    
    public function verify(Request $request)
    {
         $email=$request->email;
         $v_code=$request->v_code;
// Retrieve the user by email
         $user = User::where('email', $email)->first();

if ($user) {
    // Update the user's name and email
     if($user->v_code==$v_code)
     {
            $user->status ='1';
            $user->email_verified_at = now();
            $user->save();
              echo 'your email is verify successfully!';

     }
     else
     {
           echo 'Verification code not match!';
     }
   

   
} 
else {
    echo 'No user found with email '.$email.'.';
}



    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
        ]);
          $name=$request->name;
          $email=$request->email;
          $password = Str::random(8);
          $v_code = bin2hex(random_bytes(4));

        Mail::to($email)->send(new SendMail($name,$email,$password,$v_code));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'v_code' => $v_code,
            'password' => Hash::make($password),
        ]);


        $userId = User::where('email', $email)->first();
         $profile = Profile::create([
            'user_id' => $userId->id,
            'image' => 'profile.png',
        ]);
    
        if($user && $profile)
        {
         return redirect()->back()->with('message', 'User created successfully!');
        }
        else
        {
             return redirect()->back()->with('message', 'User not created!');
        }

   

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getSignup()
    {
        return view('user.signup');
    }
    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'email| required| unique:users',
            'password' => 'required| min:4'
        ]);
        $user = new User([
            'name' =>  $request->name,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        Auth::login($user);
        return redirect()->route('user.profile');
    }

    public function getProfile()
    {
        return view('user.profile');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/index');
    }
    public function getSignin()
    {
        return view('user.signin');
    }
    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:4'
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->password])) {
            return redirect()->route('user.profile');
        } else {
            return redirect()->back();
        };
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\MessageBag;
use App\User;

class LoginController extends Controller {

    /**
     * Login function
     * @param Request $request
     * @return type
     */
    public function login(Request $request) {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where("username", $request->username)->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {
                session()->put('user.id', $user->id);

                if ($request->remember) {
                    cookie('remember', 1, 86400);
                }

                if (session()->has('redirect')) {
                    return redirect(session()->get('redirect'));
                }

                return redirect('home');
            }
        }

        $errors = (new MessageBag())->add('username', 'Invalid username or password');

        return redirect()->back()->withErrors($errors);
    }

    public function logout() {
        session()->flush();
        return redirect('/');
    }

}

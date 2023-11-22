<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Login_cred;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->rememberme)) {
            $user = Auth::user();

            // Session creation
            $request->session()->put('sessionusername', $user->username);
            $request->session()->put('sessionusertype', $user->usertype);
            echo '<pre>';
            print_r($request->session()->put('sessionusertype', $user->usertype));
            exit;

            // Cookies
            if ($request->rememberme) {
                Cookie::queue(Cookie::make('cookieusername', $user->username, 60));
                Cookie::queue(Cookie::make('cookiepassword', $request->password, 60));
            } else {
                Cookie::queue(Cookie::make('cookieusername', null, -1));
                Cookie::queue(Cookie::make('cookiepassword', null, -1));
            }

            // File operations
            $filePath = 'cnf/' . $request->session()->get('sessionusername') . '.txt';
            if (!file_exists(storage_path($filePath))) {
                file_put_contents(storage_path($filePath), '');
            }

            // Redirect based on user type and status
            if ($user->usertype == "admin" && $user->status == "valid") {
                return redirect('/admin');
            } elseif ($user->usertype == "distributor" && $user->status == "valid") {
                return redirect('/distributor');
            } elseif ($user->usertype == "consumer" && $user->status == "valid") {
                return redirect('/consumer');
            } else {
                return redirect('/');
            }
        } else {
            $request->session()->flash('login_failed', true);
            return redirect('/');
        }
    }
}

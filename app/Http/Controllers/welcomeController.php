<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class welcomeController extends Controller
{
    public function index(Request $req){


        if(Cookie::get('cookieusername')!==""){

            $login[0]=Cookie::get('cookieusername');
            $login[1]=Cookie::get('cookiepassword');
            $login[2]='checked';

            
        }
        else{

            $login[0]="";
            $login[1]="";
            $login[2]="";

        }

        if($req->session()->has('login_failed')){

            $login_failed = $req->session()->get('login_failed');
            
        }
        else{
            
            $login_failed = 'not_created';
            
        }
        return view('welcome')->with('login',$login)->with('login_failed',$login_failed);

    }





}

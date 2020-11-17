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

        return view('welcome')->with('login',$login);
    }





}

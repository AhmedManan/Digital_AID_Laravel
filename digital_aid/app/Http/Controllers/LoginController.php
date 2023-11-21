<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Login_cred;

class LoginController extends Controller
{
    public function index(Request $req){
       
        $username= $req->username;
        $password=$req->password;



        $user = Login_cred::where('username',$username)
                          ->where('password',$password)
                          ->first();
        if(!empty($user)){
            $req->session()->put('sessionusername',$user->username);//session creation
            $req->session()->put('sessionusertype',$user->usertype);

            //cookies

            if($req->rememberme){
                Cookie::queue(Cookie::make('cookieusername', $username, 60));
                Cookie::queue(Cookie::make('cookiepassword', $password, 60));
                
                
            }
            else{

                Cookie::queue(Cookie::make('cookieusername', "", 60));
                Cookie::queue(Cookie::make('cookiepassword', "", 60));
                
            }
            

            //
            if($user->usertype=="admin" && $user->status=="valid" ){

                if(!file_exists('cnf/'.$req->session()->get('sessionusername').".txt")){
                    $myfile = fopen('cnf/'.$req->session()->get('sessionusername').".txt", "w");
                    $txt = "\n";
                    fwrite($myfile, $txt);
                    $txt = "\n";
                    fwrite($myfile, $txt);
                    $txt = "\n";
                    fwrite($myfile, $txt);
                    fclose($myfile);
                }    
                $message = "wrong answer";
                echo "<script type='text/javascript'>alert('$message');</script>";
                return redirect('/admin');

            }
            else if($user->usertype=="distributor" && $user->status=="valid" ){

                return redirect('/distributor');

            }
            else if($user->usertype=="consumer" && $user->status=="valid" ){

                return redirect('/consumer');

            }
            else{
                return redirect('/');
            }
        }
        else{
            $req->session()->put('login_failed','true');
            return redirect('/');
        }


    }
}

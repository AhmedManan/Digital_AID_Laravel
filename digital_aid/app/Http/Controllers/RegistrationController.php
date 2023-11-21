<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login_cred;
use App\User_info;
use Validator;


class RegistrationController extends Controller
{
    public function index(Request $req){
       
        return view('registration');
    }

    public function registrationPost(Request $req){
        if($req->captchacode!=$req->captchatextbox){
            $req->session()->put('errorCaptcha','error');//session creation
            $req->session()->put('registration','registration unsuccessful');//session creation

          //validator
          $validation=Validator::make($req->all(),[

            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'nid_no'=>'required',
            'gender'=>'required',
            'password'=>'required|confirmed',
            


        ]);
        if($validation->fails()){
            
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput($req->all);
        
         }
        //
           return redirect('/registration');

        }
        else{        
        $req->session()->flush();
        
        //validator
        $validation=Validator::make($req->all(),[

            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'nid_no'=>'required',
            'gender'=>'required',
            'password'=>'required|confirmed',
            


        ]);
        if($validation->fails()){
            echo "fail";
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput($req->all);
        
         }
        //

        $firstname=$req->first_name;
        $lastname=$req->last_name;
        $username=$req->username;
        $email=$req->email;
        $password=$req->password;
        $usertype=$req->usertype;
        $phone=$req->phone;
        $date=$req->date;
        $gender=$req->gender;
        $nid_no=$req->nid_no;
        $division=$req->division;
        $zilla=$req->zilla;
        $upzilla=$req->upzilla;
        $union=$req->union;
        $ward=$req->ward;
        $house=$req->road;

        $logininfo=new Login_cred();
        $logininfo->email=$email;
        $logininfo->username=$username;
        $logininfo->password=$password;
        $logininfo->status='invalid';
        $logininfo->usertype='consumer';


        $userinfo=new User_info();

        $userinfo->username=$username;
        $userinfo->first_name=$firstname;
        $userinfo->last_name=$lastname;
        $userinfo->email=$email;
        $userinfo->phone=$phone;
        $userinfo->gender=$gender;
        $userinfo->nid_no=$nid_no;
        $userinfo->birthdate=$date;
        $userinfo->division=$division;
        $userinfo->zilla=$upzilla;
        $userinfo->upzilla=$upzilla;
        $userinfo->union=$union;
        $userinfo->ward=$ward;
        $userinfo->house=$house;
        $userinfo->joindate=date('y-m-d');




        //nid photo
        if($req->hasFile('filenid')){
            $file=$req->file('filenid');
            if($file->move('img/user/nidpic/',$nid_no.'.jpg')){
              
                $userinfo->nid_photo=$nid_no;
                
                if($userinfo->save()){

              //  return redirect('/');
                }
                else{
                    return redirect('/');
                }

            }
            else{
                //upload fail
            }

        }
        else{
            //no file
           

        }
        //
        //profile pic
        
        if($req->hasFile('file')){
            $file=$req->file('file');
            if($file->move('img/user/profilepic/',$username.'.jpg')){
              
                $userinfo->person_photo=$username;
                
                if($userinfo->save()){

                   
                // return redirect('/');
                }
                else{
                    return redirect('/');
                }

            }
            else{
                //upload fail
            }

        }
        else{
            //no file
        }
        //

        $userinfo->save();
        $logininfo->save();

        $req->session()->put('registration','successful');//session creation


        return redirect('/registration');

    }
 }
}

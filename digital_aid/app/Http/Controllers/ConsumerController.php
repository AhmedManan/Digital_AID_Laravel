<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Validator;

use Illuminate\Http\Request;
use App\User_info;
use App\Login_cred;
use App\report;
use App\announcement;
use App\distributed_aid;
use App\notification;

class ConsumerController extends Controller
{
    public function index(Request $req){

       $username= $req->session()->get('sessionusername');


       //common in all pages
       $user = DB::table('login_creds')
                ->join('user_infos','login_creds.username','=','user_infos.username')
                ->where('login_creds.username','=',$username)
                ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
                ->first();
        $allmessages= announcement::where('receiver','consumer')
                                    ->where('username','not like','%'.$username.'%')                                   
                                    ->orWhere('receiver','all')
                                    ->where('username','not like','%'.$username.'%') 
                                    ->get();
        $allmessagescount= announcement::where('receiver','consumer')
                                        ->where('username','not like','%'.$username.'%')
                                        ->orWhere('receiver','all')
                                        ->where('username','not like','%'.$username.'%') 
                                        ->count();
       

        return view('consumer.consumerhome') // common in all
                                            ->with('user',$user)
                                            ->with('allmessages',$allmessages)
                                            ->with('allmessagescount',$allmessagescount);
    }


    public function consumerhistory(Request $req){

        $username= $req->session()->get('sessionusername');
 
 
       //common in all pages
       $user = DB::table('login_creds')
                ->join('user_infos','login_creds.username','=','user_infos.username')
                ->where('login_creds.username','=',$username)
                ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
                ->first();
                $allmessages= announcement::where('receiver','consumer')
                ->where('username','not like','%'.$username.'%')                                   
                ->orWhere('receiver','all')
                ->where('username','not like','%'.$username.'%') 
                ->get();
                $allmessagescount= announcement::where('receiver','consumer')
                                    ->where('username','not like','%'.$username.'%')
                                    ->orWhere('receiver','all')
                                    ->where('username','not like','%'.$username.'%') 
                                    ->count();

        // $disinvdate=distributed_aid::where('c_username',$username)->groupBy('date')->get();

                    $disinvdate= DB::table('distributed_aids')
                                    ->select('date')
                                    ->where('c_username',$username)                    
                                    ->groupBy('date')
                                    ->get();
                     
                    //  echo $disinvdate;
                     
                     $history= distributed_aid::where('c_username',$username)
                     ->get();
        $arrobj=array();
        foreach($disinvdate as $val){
            $dusername='';
            $item='';
        
            $cusername='';
            foreach($history as $res){
                
                if($val->date==$res->date){

                    $dusername=$res->d_username;
                    $cusername=$res->c_username;
                
                    $item = $item.$res->i_item.'='.$res->i_quantity." , ";
                 }
                else{
                //   echo $res->date;
                }

            }
           $items= substr($item ,0,-2);
            // rtrim($item, ',');
            array_push($arrobj,(object)array("date"=>$val->date,"distributor"=>$dusername,"consumer"=>$cusername,"item"=>$items));

                
            }
            
            // foreach($arrobj as $val){
            //     print_r($val->date);
            // }
            

         return view('consumer.consumerhistory') //common in all
                                                ->with('user',$user)
                                                ->with('allmessages',$allmessages)
                                                ->with('allmessagescount',$allmessagescount)

                                                ->with('history',$history)
                                                ->with('disinvdate',$disinvdate)
                                                ->with('value',$arrobj);
     }

     public function allmsg(Request $req){

        $username= $req->session()->get('sessionusername');


        $allmessages= announcement::where('receiver','consumer')                                         
                                    ->where('username','not like','%'.$username.'%')                                   
                                    ->get();

        $allmessagescount= announcement::where('receiver','consumer')
                                        ->where('username','not like','%'.$username.'%')
                                        ->count();

        return response()->json(array('allmsg'=> $allmessages,'msgcount'=> $allmessagescount), 200);    

     }

    public function announcementseen(Request $req,$id){

        $username= $req->session()->get('sessionusername');

        $announcement=announcement::where('id',$id)->first();

            // echo $announcement;
        $announcement->username=$announcement->username.','.$username;

        $announcement->save();

        // $allmessages= announcement::where('receiver','consumer')
        // ->where('username','not like','%'.$username.'%')                                   
        // ->get();

        // $allmessagescount= announcement::where('receiver','consumer')
        // ->where('username','not like','%'.$username.'%')
        //    ->count();

        // return response()->json(array('msgcount'=> $allmessagescount), 200);   
        return redirect("/consumer");
        
    }

    public function report(Request $req){

        $username= $req->session()->get('sessionusername');
 
 
       //common in all pages
       $user = DB::table('login_creds')
                ->join('user_infos','login_creds.username','=','user_infos.username')
                ->where('login_creds.username','=',$username)
                ->select('login_creds.id','user_infos.username', 'user_infos.email', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
                ->first();
                $allmessages= announcement::where('receiver','consumer')
                ->where('username','not like','%'.$username.'%')                                   
                ->orWhere('receiver','all')
                ->where('username','not like','%'.$username.'%') 
                ->get();
                $allmessagescount= announcement::where('receiver','consumer')
                    ->where('username','not like','%'.$username.'%')
                    ->orWhere('receiver','all')
                    ->where('username','not like','%'.$username.'%') 
                    ->count();

         $sender=$user->username;
         $report = report::where('sender',$sender)->get();
         $reportcount = report::where('sender',$sender)->count();

         return view('consumer.consumerreport') // common in all
                                                ->with('user',$user)
                                                ->with('allmessages',$allmessages)
                                                ->with('allmessagescount',$allmessagescount)
                                                
                                                ->with('report',$report)
                                                ->with('reportcount',$reportcount);
     }
    public function reportPost(Request $req){

        $username= $req->session()->get('sessionusername');
 
 
        $user = Login_cred::where('username',$username)
        ->first();

        $report=new report();

        $report->sender=$user->username;
        $report->subject=$req->subject;
        $report->description=$req->description;
        $report->date=date('Y-m-d');
        $report->status="unsolved";
        $report->save();
        
        return redirect('/consumer/reports');

      
     }

     public function viewProfile(Request $req,$usernameprofile){

        $username= $req->session()->get('sessionusername');

               //common in all pages
                $user = DB::table('login_creds')
                ->join('user_infos','login_creds.username','=','user_infos.username')
                ->where('login_creds.username','=',$username)
                ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
                ->first();
                $allmessages= announcement::where('receiver','consumer')
                ->where('username','not like','%'.$username.'%')                                   
                ->orWhere('receiver','all')
                ->where('username','not like','%'.$username.'%') 
                ->get();
                $allmessagescount= announcement::where('receiver','consumer')
                    ->where('username','not like','%'.$username.'%')
                    ->orWhere('receiver','all')
                    ->where('username','not like','%'.$username.'%') 
                    ->count();              

                $userprofile = Login_cred::where('username',$usernameprofile)
                                            ->first();
                $userinfoprofile = User_info::where('username',$usernameprofile)
                                            ->first();
      
        return view('consumer.viewprofile') // common in all
                                            ->with('user',$user)
                                            ->with('allmessages',$allmessages)
                                            ->with('allmessagescount',$allmessagescount)

                                            ->with('userprofile',$userprofile)
                                            ->with('userinfoprofile',$userinfoprofile);

                                             

     }

     public function viewProfilePost(Request $req,$usernameprofile){

        $username= $req->session()->get('sessionusername');


        $userprofile = Login_cred::where('username',$usernameprofile)
        ->first();
        $userinfoprofile = User_info::where('username',$usernameprofile)
        ->first();

        //validator
        $validation=Validator::make($req->all(),[

            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'nid_no'=>'required',
            'gender'=>'required',
            'usertype'=>'required',
            'currentpassword'=>'required',
            'password'=>'confirmed'


        ]);
        if($validation->fails()){
            
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        
         }
        //
     

         $firstname=$req->firstname;
         $lastname=$req->lastname;
         $email=$req->email;
         $phone=$req->phone;
         $nid_no=$req->nid_no;
         $gender=$req->gender;
         $usertype=$req->usertype;
        if($req->submit=="update"){

            //nid photo
            if($req->hasFile('file')){
                $file=$req->file('file');
                if($file->move('img/user/nidpic/',$req->nidtitle.'.jpg')){
                  
                    $userinfoprofile->nid_photo=$req->nidtitle;
                    
                    if($userinfoprofile->save()){
    
                    //   return redirect()->route('admin.viewprofile',$req->picturetitle);
                       
                    return redirect('/consumer');
                    }
                    else{
                        return redirect('/consumer');
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
            
            if($req->password!=null && $req->password_confirmation!=null){
                $userprofile->password=$req->password;
                
            }
            

            if($req->currentpassword==$userprofile->password){
             $userinfoprofile->first_name=$firstname;
             $userinfoprofile->last_name=$lastname;
             $userinfoprofile->email=$email;
             $userinfoprofile->phone=$phone;
             $userinfoprofile->nid_no=$nid_no;
             $userinfoprofile->gender=$gender;
             $userprofile->usertype=$usertype;
             $userinfoprofile->save();
             $userprofile->save();

             if($username==$userprofile->username){
                $notification=new notification();
                $notification->receiver='admin';
                $notification->sender=$userprofile->username;
                $notification->description='changed your information';
                $notification->date=date('y-m-d');
                $notification->save();
             }
            }
            
           return redirect()->route('consumer.viewprofile',$usernameprofile);
        }
        // if($req->submit=="delete"){
        //     $userinfoprofile->delete();
        //     return redirect("/consumer");
        // }
        

    }

    public function updatePicturePost(Request $req){

        if($req->hasFile('file')){
            $file=$req->file('file');
            if($file->move('img/user/profilepic/',$req->picturetitle.'.jpg')){
                $userinfo=User_info::where('username',$req->picturetitle)
                ->first();
                $userinfo->person_photo=$req->picturetitle;
                
                if($userinfo->save()){

                   return redirect()->route('consumer.viewprofile',$req->picturetitle);
                   
                }
                else{
                    return redirect('/consumer');
                }

            }
            else{
                //upload fail
            }

        }
        else{
            //no file
        }

     }

    
}

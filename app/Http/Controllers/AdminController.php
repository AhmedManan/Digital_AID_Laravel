<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Validator;


use Illuminate\Http\Request;
use App\User_info;
use App\Login_cred;
use App\inventory;
use App\distributed_inventory;
use App\distributed_aid;
use App\report;
use App\announcement;
use App\message;
use App\notification;
//
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\inventories;

class AdminController extends Controller
{
    public function themeChange(Request $req,$id)
    {
    if(!file_exists('cnf/'.$req->session()->get('sessionusername').".txt")){
        $myfile = fopen('cnf/'.$req->session()->get('sessionusername').".txt", "w");
    }    
    $myFile = 'cnf/'.$req->session()->get('sessionusername').".txt";
    $lines = file($myFile);//file in to an array
    echo $id;
    $myfile = fopen($myFile, "w");
    if($id==1){

        $lines[1] = "\n";
    }
    else if($id==2){
        $lines[1] = "mainNav\n";

    }
    else if($id==3){
        $lines[1] = "mainNav2\n";

    }
    else if($id==4){
        $lines[1] = "mainNav3\n";

    }
    else if($id==5){
        $lines[1] = "mainNav4\n";

    }
    $str=implode("",$lines);
    fwrite($myfile, $str);
    fclose($myfile);
    // echo $str;
      return redirect('/admin/theme');
    }
    public function index(Request $req){

       $username= $req->session()->get('sessionusername');

       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

        // only dashboard page
        $totaluser= Login_cred::count();
        $totaldist= Login_cred::where('usertype','distributor')->count();
        $totalconsumer= Login_cred::where('usertype','consumer')->count();
        $totaladmin= Login_cred::where('usertype','admin')->count();

            // $user=DB::table('Login_creds')->where('username',$username)
    //                 ->LeftJoin('user_infos','login_creds.username','=','user_infos.username')
    //                 ->select('login_creds.username','user_infos.username')->first();
        /*$user = Login_cred::where('username',$username)
        ->first();
        
        $userinfo = User_info::where('username',$username)
        ->first(); */
        //  echo $user;
        // var_dump($user);
        // print_r($user);
        
        return view('admin.adminhome') //common for all pages
                                      ->with('dashboard',$dashboard)
                                      ->with('user',$user)
                                      ->with('totalreport',$totalreport)
                                      ->with('invaliduser',$invaliduser)
                                      ->with('itemstatus',$itemstatus)
                                      ->with('pmessages',$pmessages)
                                      ->with('pmessagescount',$pmessagescount)

                                      //admin home
                                      ->with('totaluser',$totaluser)
                                      ->with('totaldist',$totaldist)
                                      ->with('totalreport',$totalreport)
                                      ->with('totalconsumer',$totalconsumer)
                                      ->with('totaladmin',$totaladmin);
    }

    public function users(Request $req,$name=""){

        $username= $req->session()->get('sessionusername');
        
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

         $users = Login_cred::all();
         return view('admin.adminusers')//common for all pages
                                        ->with('dashboard',$dashboard)
                                        ->with('user',$user)
                                        ->with('totalreport',$totalreport)
                                        ->with('invaliduser',$invaliduser)
                                        ->with('itemstatus',$itemstatus)
                                        ->with('pmessages',$pmessages)
                                        ->with('pmessagescount',$pmessagescount)
                                        
                                        ->with('users',$users);
     }

     public function adminslist(Request $req,$name=""){

        $username= $req->session()->get('sessionusername');
        
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

        $admins = DB::table('login_creds')
        ->join('user_infos','login_creds.username','=','user_infos.username')
        ->where('login_creds.usertype','=','admin')
        ->where('login_creds.status','=','valid')
        ->select('login_creds.id','login_creds.email','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
        ->get();

         return view('admin.adminadminlist')//common for all pages
                                        ->with('dashboard',$dashboard)
                                        ->with('user',$user)
                                        ->with('totalreport',$totalreport)
                                        ->with('invaliduser',$invaliduser)
                                        ->with('itemstatus',$itemstatus)
                                        ->with('pmessages',$pmessages)
                                        ->with('pmessagescount',$pmessagescount)
                                        
                                        ->with('admins',$admins);
     }

     public function distributorslist(Request $req,$name=""){

        $username= $req->session()->get('sessionusername');
        
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

        $distributors = DB::table('login_creds')
        ->join('user_infos','login_creds.username','=','user_infos.username')
        ->where('login_creds.usertype','=','distributor')
        ->where('login_creds.status','=','valid')
        ->select('login_creds.id','login_creds.email','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
        ->get();

         return view('admin.admindistributorlist')//common for all pages
                                        ->with('dashboard',$dashboard)
                                        ->with('user',$user)
                                        ->with('totalreport',$totalreport)
                                        ->with('invaliduser',$invaliduser)
                                        ->with('itemstatus',$itemstatus)
                                        ->with('pmessages',$pmessages)
                                        ->with('pmessagescount',$pmessagescount)
                                        
                                        ->with('distributors',$distributors);
     }

     public function consumerslist(Request $req,$name=""){

        $username= $req->session()->get('sessionusername');
        
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

        $consumers = DB::table('login_creds')
        ->join('user_infos','login_creds.username','=','user_infos.username')
        ->where('login_creds.usertype','=','consumer')
        ->where('login_creds.status','=','valid')
        ->select('login_creds.id','login_creds.email','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
        ->get();

         return view('admin.adminconsumerlist')//common for all pages
                                        ->with('dashboard',$dashboard)
                                        ->with('user',$user)
                                        ->with('totalreport',$totalreport)
                                        ->with('invaliduser',$invaliduser)
                                        ->with('itemstatus',$itemstatus)
                                        ->with('pmessages',$pmessages)
                                        ->with('pmessagescount',$pmessagescount)
                                        
                                        ->with('consumers',$consumers);
     }

     public function unverifiedusers(Request $req,$name=""){

        $username= $req->session()->get('sessionusername');
        
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

        $unverifiedusers = DB::table('login_creds')
        ->join('user_infos','login_creds.username','=','user_infos.username')
        // ->where('login_creds.usertype','=','consumer')
        ->where('login_creds.status','=','invalid')
        ->select('login_creds.id','login_creds.email','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'login_creds.usertype', 'user_infos.person_photo' )
        ->get();

         return view('admin.adminunverifiedusers')//common for all pages
                                        ->with('dashboard',$dashboard)
                                        ->with('user',$user)
                                        ->with('totalreport',$totalreport)
                                        ->with('invaliduser',$invaliduser)
                                        ->with('itemstatus',$itemstatus)
                                        ->with('pmessages',$pmessages)
                                        ->with('pmessagescount',$pmessagescount)
                                        
                                        ->with('unverifiedusers',$unverifiedusers);
     }

     //valid user now
     public function validnow(Request $req,$usernameprofile){
            $user=Login_cred::where('username',$usernameprofile)->first();

            $username= $req->session()->get('sessionusername');
        
            //common in all pages
            $user = DB::table('login_creds')
            ->join('user_infos','login_creds.username','=','user_infos.username')
            ->where('login_creds.username','=',$username)
            ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
            ->first();
             $totalreport= report::where('status','unsolved')->count();
             $itemstatus= inventory::where('quantity','0')->count();
             $invaliduser= login_cred::where('status','invalid')->count();
     
             $dashboard=$totalreport+$invaliduser+$itemstatus;
     
             $pmessages= message::where('receiver',$username)
             ->where('status','unseen')
             ->get();
             $pmessagescount= message::where('receiver',$username)
             ->where('status','unseen')
             ->count();
     
             $unverifiedusers = DB::table('login_creds')
             ->join('user_infos','login_creds.username','=','user_infos.username')
             // ->where('login_creds.usertype','=','consumer')
             ->where('login_creds.status','=','invalid')
             ->select('login_creds.id','login_creds.email','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'login_creds.usertype', 'user_infos.person_photo' )
             ->get();
            // $user->status="valid";
            // $user->save();

            return view('admin.admincardscan') ->with('dashboard',$dashboard)
                                            ->with('user',$user)
                                            ->with('totalreport',$totalreport)
                                            ->with('invaliduser',$invaliduser)
                                            ->with('itemstatus',$itemstatus)
                                            ->with('pmessages',$pmessages)
                                            ->with('pmessagescount',$pmessagescount)
                                            
                                            ->with('userinfoprofile',$usernameprofile);
     }

     public function cardscanPost(Request $req){

       

        $qrcode=$req->qrval;
        $username=$req->username;

        $userprofile = Login_cred::where('username',$username)
        ->first();
        $userprofile->status='valid';

        $userprofile->save();

        $userinfoprofile = User_info::where('username',$username)
        ->first();

        $userinfoprofile->qr_code=$qrcode;

        $userinfoprofile->save();


        return redirect('/admin');
        

     }

     //searchadmin
     public function adminsearchPost(Request $req){

        $req->session()->put('sessionsearch',$req->searchusername);

        return redirect('/admin/searchadmin');
        

     }
     public function adminsearch(Request $req){

        $username= $req->session()->get('sessionusername');
        
        $searchusername=$req->session()->get('sessionsearch');
 
        $user = Login_cred::where('username',$searchusername)->first();
      
        
        // echo $user;
        // print_r($user);
        $userinfo = User_info::where('username',$username)
       ->first();
        return view('admin.adminsearchusers')->with('result',$user)->with('userinfo',$userinfo);

     }



     public function viewProfile(Request $req,$usernameprofile){

        $username= $req->session()->get('sessionusername');


       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

        $userprofile = Login_cred::where('username',$usernameprofile)
        ->first();
        $userinfoprofile = User_info::where('username',$usernameprofile)
        ->first();
        return view('admin.adminprofileview') //common for all pages
                                        ->with('dashboard',$dashboard)
                                        ->with('user',$user)
                                        ->with('totalreport',$totalreport)
                                        ->with('invaliduser',$invaliduser)
                                        ->with('itemstatus',$itemstatus)
                                        ->with('pmessages',$pmessages)
                                        ->with('pmessagescount',$pmessagescount)                                

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
                       
                    return redirect('/admin');
                    }
                    else{
                        return redirect('/admin');
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

            }
            
           return redirect()->route('admin.viewprofile',$usernameprofile);
        }
        if($req->submit=="delete"){
            $userinfoprofile->delete();
            return redirect("/admin");
        }
        

    }

    public function userupdatePost(Request $req){

        $username= $req->session()->get('sessionusername');
        $userprofile = Login_cred::where('username',$req->username)
        ->first();
       
       $userprofile->usertype=$req->usertype;
       $userprofile->save();

       if($username!=$userprofile->username){
        $notification=new notification();
        $notification->receiver=$userprofile->username;
        $notification->sender=$username;
        $notification->description='changed your information';
        $notification->date=date('y-m-d');
        $notification->save();
     }
       return redirect('/admin');
       

    }

    public function inventory(Request $req){

        $username= $req->session()->get('sessionusername');
 
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

         $inventory = inventory::all();
         $distributor= Login_cred:: where('usertype','distributor')
         ->get();
         $distributed_inventory = distributed_inventory::all();



         return view('admin.admininventory')//common for all pages
                                            ->with('dashboard',$dashboard)
                                            ->with('user',$user)
                                            ->with('totalreport',$totalreport)
                                            ->with('invaliduser',$invaliduser)
                                            ->with('itemstatus',$itemstatus)
                                            ->with('pmessages',$pmessages)
                                            ->with('pmessagescount',$pmessagescount)
                                            //inventory
                                            ->with('inventory',$inventory)
                                            ->with('distributor',$distributor)
                                            ->with('distributed_inventory',$distributed_inventory);
     }

     public function inventoryPost(Request $req){

        $username= $req->session()->get('sessionusername');
        $user = Login_cred::where('username',$username)
        ->first();
        $userinfo = User_info::where('username',$username)
        ->first();
 
         $inventory = inventory::where('id',$req->id)->first();
        

         $option=$req->optionsRadios;
         $quantity=$req->quantity;
        if($req->submit=="update"){
           
            if($option=="+"){
                $inventory->quantity+=$quantity;
                $inventory->save();
            }
            if($option=="-"){
                $inventory->quantity-=$quantity;
                $inventory->save();
            }
            else{
                if($req->distributor!=""){
                    $distributor= new distributed_inventory();
                    $distributor->d_username=$req->distributor;
                    $distributor->i_name=$req->name;
                    $distributor->i_quantity=$req->quantity;
                    $distributor->assign_date=date('Y-m-d');
                    $distributor->save();
                   
                    //return response($inventory,200);
                
               
                
                $inventory->quantity-=$quantity;
                $inventory->save();
                }
                else{
                    return redirect("/admin/inventory");
                }
            }
        
            
            
            
           return redirect("/admin/inventory");
        }
        if($req->submit=="delete"){
            $inventory->delete();
            return redirect("/admin/inventory");
        }

        if($req->submit=="add"){
          
            $inventory= new inventory();
            $inventory->name=$req->name;
            $inventory->quantity=$req->quantity;
            $inventory->save();
            return redirect("/admin/inventory");
        }


        //  return view('admin.admininventory')->with('user',$user)
        //                                 ->with('userinfo',$userinfo)
        //                                 ->with('inventory',$inventory);
     }

     public function updatePicturePost(Request $req){

        if($req->hasFile('file')){
            $file=$req->file('file');
            if($file->move('img/user/profilepic/',$req->picturetitle.'.jpg')){
                $userinfo=User_info::where('username',$req->picturetitle)
                ->first();
                $userinfo->person_photo=$req->picturetitle;
                
                if($userinfo->save()){

                   return redirect()->route('admin.viewprofile',$req->picturetitle);
                   
                }
                else{
                    return redirect('/admin');
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

     public function inventoryexcel(Request $req){
        if($req->submit=="Excel"){

          return Excel::download(new inventories,'inventory.xlsx');
        }
      }

      public function report(Request $req){

        $username= $req->session()->get('sessionusername');
 
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

        $report = report::all();

     
 
         return view('admin.adminreports') //common for all pages
                                            ->with('dashboard',$dashboard)
                                            ->with('user',$user)
                                            ->with('totalreport',$totalreport)
                                            ->with('invaliduser',$invaliduser)
                                            ->with('itemstatus',$itemstatus)
                                            ->with('pmessages',$pmessages)
                                            ->with('pmessagescount',$pmessagescount)

                                            ->with('report',$report);
     }

     public function reportPost(Request $req){

        $username= $req->session()->get('sessionusername');
 
                $reply=$req->reply;

                 $report=report::where('id',$req->id)->first();
                 $report->status="solved";
                 $report->reply=$reply;
                 $report->actioned_by=$username;
                 $report->save();
     
                 return redirect('/admin/reports');
     }

     public function announcement(Request $req){

        $username= $req->session()->get('sessionusername');
 
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

         $alluser=Login_cred::all();

         return view('admin.adminannouncement')//common for all pages
                                                ->with('dashboard',$dashboard)
                                                ->with('user',$user)
                                                ->with('totalreport',$totalreport)
                                                ->with('invaliduser',$invaliduser)
                                                ->with('itemstatus',$itemstatus)
                                                ->with('pmessages',$pmessages)
                                                ->with('pmessagescount',$pmessagescount)

                                                ->with('result',$alluser);
     }


     public function announcementPost(Request $req){

        $announcement=new announcement();
        $announcement->receiver=$req->receiver;
        $announcement->sender=$req->session()->get('sessionusername');
        $announcement->description=$req->description;
        $announcement->date=date('Y-m-d');
        $announcement->username='none';
        $announcement->save();
        return redirect('/admin/announcement');


     }

     public function inbox(Request $req){

        $username= $req->session()->get('sessionusername');
 
       //common in all pages
       $user = DB::table('login_creds')
       ->join('user_infos','login_creds.username','=','user_infos.username')
       ->where('login_creds.username','=',$username)
       ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
       ->first();
        $totalreport= report::where('status','unsolved')->count();
        $itemstatus= inventory::where('quantity','0')->count();
        $invaliduser= login_cred::where('status','invalid')->count();

        $dashboard=$totalreport+$invaliduser+$itemstatus;

        $pmessages= message::where('receiver',$username)
        ->where('status','unseen')
        ->get();
        $pmessagescount= message::where('receiver',$username)
        ->where('status','unseen')
        ->count();

        $result=login_cred::where('status','valid')
                            ->where('usertype','admin')  
                            ->where('username','!=',$username)                          
                            ->get();

        $messages = message::where('receiver',$username)
                            ->orWhere('sender',$username)
                        ->get();

         return view('admin.admininbox') //common for all pages
                                      ->with('dashboard',$dashboard)
                                      ->with('user',$user)
                                      ->with('totalreport',$totalreport)
                                      ->with('invaliduser',$invaliduser)
                                      ->with('itemstatus',$itemstatus)
                                      ->with('pmessages',$pmessages)
                                      ->with('pmessagescount',$pmessagescount)

                                       ->with('result',$result)
                                       ->with('messages',$messages);

     }

     public function inboxPost(Request $req,$sentby){

        $username= $req->session()->get('sessionusername');
        $receiver=$req->receiver;
        $text=$req->text;
        
        $message=new message();
        $message->sender=$username;
        $message->receiver=$receiver;
        $message->text=$text;
        $message->date=date('Y-m-d');
        $message->status="unseen";
        
        $message->save();

        return redirect()->route('admin.inbox',['sentby'=>$sentby]);
     }

     public function inboxNewMsg(Request $req,$sentby){


        $username= $req->session()->get('sessionusername');
        echo $sentby;
        //common in all pages
        $user = DB::table('login_creds')
        ->join('user_infos','login_creds.username','=','user_infos.username')
        ->where('login_creds.username','=',$username)
        ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
        ->first();
         $totalreport= report::where('status','unsolved')->count();
         $itemstatus= inventory::where('quantity','0')->count();
         $invaliduser= login_cred::where('status','invalid')->count();
 
         $dashboard=$totalreport+$invaliduser+$itemstatus;
 
         $pmessages= message::where('receiver',$username)
         ->where('status','unseen')
         ->get();
         $pmessagescount= message::where('receiver',$username)
         ->where('status','unseen')
         ->count();
 
         $result=login_cred::where('status','valid')
                             ->where('usertype','admin')  
                             ->where('username','!=',$username)                          
                             ->get();
 
         $messages = message::where('receiver',$username)
                             ->orWhere('sender',$username)
                         ->get();

         $msgseen=message::where('receiver',$sentby)
                            ->orWhere('sender',$sentby)
                            ->update(['status'=>'seen']);

 
          return view('admin.admininbox') //common for all pages
                                       ->with('dashboard',$dashboard)
                                       ->with('user',$user)
                                       ->with('totalreport',$totalreport)
                                       ->with('invaliduser',$invaliduser)
                                       ->with('itemstatus',$itemstatus)
                                       ->with('pmessages',$pmessages)
                                       ->with('pmessagescount',$pmessagescount)
 
                                        ->with('result',$result)
                                        ->with('messages',$messages)
                                        ->with('sentby',$sentby);
 




     }

     public function theme(Request $req){

        $username= $req->session()->get('sessionusername');
 
        //common in all pages
        $user = DB::table('login_creds')
        ->join('user_infos','login_creds.username','=','user_infos.username')
        ->where('login_creds.username','=',$username)
        ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
        ->first();
         $totalreport= report::where('status','unsolved')->count();
         $itemstatus= inventory::where('quantity','0')->count();
         $invaliduser= login_cred::where('status','invalid')->count();
 
         $dashboard=$totalreport+$invaliduser+$itemstatus;
 
         $pmessages= message::where('receiver',$username)
         ->where('status','unseen')
         ->get();
         $pmessagescount= message::where('receiver',$username)
         ->where('status','unseen')
         ->count();
 
         return view('admin.theme') //common for all pages
                                       ->with('dashboard',$dashboard)
                                       ->with('user',$user)
                                       ->with('totalreport',$totalreport)
                                       ->with('invaliduser',$invaliduser)
                                       ->with('itemstatus',$itemstatus)
                                       ->with('pmessages',$pmessages)
                                       ->with('pmessagescount',$pmessagescount);

     }





}





/*

$inventories= new invertory();
$userinfo->id="1";
$userinfo->name="manan";
$userinfo->save();



*/
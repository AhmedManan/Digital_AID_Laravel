<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Validator;



use Illuminate\Http\Request;
use App\User_info;
use App\Login_cred;
use App\Inventory;
use App\Distributed_aid;
use App\Distributed_inventory;
use App\Announcement;


class DistributorController extends Controller
{
   public function index(Request $req){

      $username= $req->session()->get('sessionusername');


       //common in all pages
       $user = DB::table('login_creds')
                ->join('user_infos','login_creds.username','=','user_infos.username')
                ->where('login_creds.username','=',$username)
                ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
                ->first();
        $allmessages= announcement::where('receiver','distributor')
                                    ->where('username','not like','%'.$username.'%')                                   
                                    ->get();
        $allmessagescount= announcement::where('receiver','distributor')
                                         ->where('username','not like','%'.$username.'%')
                                            ->count();

       return view('distributor.distributorhome') //common in all
                                                   ->with('user',$user)
                                                   ->with('allmessages',$allmessages)
                                                   ->with('allmessagescount',$allmessagescount);
   }

   public function announcementseen(Request $req,$id){

      $username= $req->session()->get('sessionusername');

      $announcement=announcement::where('id',$id)->first();
          // echo $announcement;
      $announcement->username=$announcement->username.','.$username;
      $announcement->save();

      return redirect('/distributor');
      
  }

  public function allmsg(Request $req){

    $username= $req->session()->get('sessionusername');

   // $announcement=announcement::where('id',$id)->first();

    $allmessages= announcement::where('receiver','distributor')
    ->where('username','not like','%'.$username.'%')                                   
    ->first();

    $allmessagescount= announcement::where('receiver','distributor')
    ->where('username','not like','%'.$username.'%')
       ->count();

    return response()->json(array('allmsg'=> $allmessages,'msgcount'=> $allmessagescount), 200);    

 }

    public function users(Request $req){

      $username= $req->session()->get('sessionusername');


       //common in all pages
       $user = DB::table('login_creds')
                ->join('user_infos','login_creds.username','=','user_infos.username')
                ->where('login_creds.username','=',$username)
                ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
                ->first();
        $allmessages= announcement::where('receiver','distributor')
                                    ->where('username','not like','%'.$username.'%')                                   
                                    ->get();
        $allmessagescount= announcement::where('receiver','distributor')
                                         ->where('username','not like','%'.$username.'%')
                                            ->count();
         
         $users = DB::table('login_creds')
                           ->join('user_infos','login_creds.username','=','user_infos.username')
                           ->where('login_creds.usertype','=','consumer')
                           ->where('login_creds.status','=','valid')
                           ->select('login_creds.id','login_creds.email','user_infos.username', 'user_infos.first_name', 'user_infos.last_name', 'user_infos.person_photo' )
                           ->get();

         return view('distributor.distributorusers')//common in all
                                                   ->with('user',$user)
                                                   ->with('allmessages',$allmessages)
                                                   ->with('allmessagescount',$allmessagescount)

                                                   ->with('users',$users);

     }

     public function distributorhistory(Request $req){

      $username= $req->session()->get('sessionusername');


     //common in all pages
     $user = DB::table('login_creds')
              ->join('user_infos','login_creds.username','=','user_infos.username')
              ->where('login_creds.username','=',$username)
              ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
              ->first();
      $allmessages= announcement::where('receiver','distributor')
                                  ->where('username','not like','%'.$username.'%')                                   
                                  ->get();
      $allmessagescount= announcement::where('receiver','distributor')
                                       ->where('username','not like','%'.$username.'%')
                                          ->count();

      // $disinvdate=distributed_aid::where('c_username',$username)->groupBy('date')->get();

     $disinvdate= DB::table('distributed_aids')
                   ->select('date')
                   ->where('c_username',$username)                    
                   ->groupBy('date')
                   ->get();
                   
                  //  echo $disinvdate;
                   
                   $history= distributed_aid::where('d_username',$username)
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
          

       return view('distributor.distributorhistory') //common in all
                                              ->with('user',$user)
                                              ->with('allmessages',$allmessages)
                                              ->with('allmessagescount',$allmessagescount)

                                              ->with('history',$history)
                                              ->with('disinvdate',$disinvdate)
                                              ->with('value',$arrobj);
   }

     public function distribute(Request $req){


        $username= $req->session()->get('sessionusername');
 
 
       //common in all pages
       $user = DB::table('login_creds')
                ->join('user_infos','login_creds.username','=','user_infos.username')
                ->where('login_creds.username','=',$username)
                ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
                ->first();
        $allmessages= announcement::where('receiver','distributor')
                                    ->where('username','not like','%'.$username.'%')                                   
                                    ->get();
        $allmessagescount= announcement::where('receiver','distributor')
                                         ->where('username','not like','%'.$username.'%')
                                            ->count();

         $inventory = distributed_inventory::where('d_username',$username)->get();
         $inventoryCount =  distributed_inventory::where('d_username',$username)->count();

         $inventoryCount=ceil($inventoryCount/2);


         return view('distributor.distribute')//common in all
                                             ->with('user',$user)
                                             ->with('allmessages',$allmessages)
                                             ->with('allmessagescount',$allmessagescount)
                                             
                                             ->with('inventory',$inventory)
                                             ->with('inventoryCount',$inventoryCount);
                                       
     }

     public function DistributePost(Request $req){

        $username= $req->session()->get('sessionusername');
        $user = Login_cred::where('username',$username)
        ->first();
        $userinfo = User_info::where('username',$username)
        ->first();
 
         // $inventory = inventory::where('id',$req->id)->first();


         // $itemname=$req->name;
         // $quantity=$req->quantity;
         $consumer=$req->consumer;
        $val=$req->input();
        
      //   echo $val;
      // var_dump($val["quantity1"]);
      //    $s=1;
      //  for( $i=0;$i<count($val);$i++){

      //       $name="name".$s;
      //       $n="quantity".$s;
      //       $s++;
      //       var_dump($val[$name]);
      //       var_dump($val[$n]);
      //  }
        if($req->submit=="update"){
         //
         $s=1;
         for( $i=0;$i<count($val);$i++){
  
              $name="name".$s;
              $qnt="quantity".$s;
              $s++;
              if(!empty($val[$name]) && !empty($val[$qnt])){

           $inventory =  distributed_inventory::where('i_name',$val[$name])
                                                ->where('d_username',$username)
                                                ->first();

           $inventory->i_quantity-=intval($val[$qnt]);
           $inventory->save();

           //
              $dAid=new  Distributed_aid();

                $dAid->d_username=$username;
                $dAid->c_username=$req->consumer;
                $dAid->i_item=$val[$name];
                $dAid->i_quantity=$val[$qnt];
                $dAid->date=date("Y/m/d");

                $dAid->save();          


              }
         }


         //
           
           
               //  $inventory->quantity-=$quantity;
               //  $inventory->save();

               //  $dAid=new  Distributed_aid();

               //  $dAid->d_username=$username;
               //  $dAid->c_username=$consumer;
               //  $dAid->i_item=$itemname;
               //  $dAid->i_quantity=$quantity;
               //  $dAid->date=date("Y/m/d");

               //  $dAid->save();          
        
            
            
            
           return redirect("/distributor/distribute");
        }
    }

     public function verify(Request $req){

        $value = $req->value;
        $userinfo=User_info::where('qr_code',$value)
        ->first();

        return response()->json(array('userinfo'=> $userinfo), 200);
        
     }

     public function viewProfile(Request $req,$usernameprofile){

      $username= $req->session()->get('sessionusername');

             //common in all pages
              $user = DB::table('login_creds')
              ->join('user_infos','login_creds.username','=','user_infos.username')
              ->where('login_creds.username','=',$username)
              ->select('login_creds.id','user_infos.username', 'user_infos.first_name', 'user_infos.last_name','user_infos.person_photo' )
              ->first();
              $allmessages= announcement::where('receiver','distributor')
                                          ->where('username','not like','%'.$username.'%')                                   
                                          ->get();
              $allmessagescount= announcement::where('receiver','distributor')
                                              ->where('username','not like','%'.$username.'%')
                                              ->count();                 

              $userprofile = Login_cred::where('username',$usernameprofile)
                                          ->first();
              $userinfoprofile = User_info::where('username',$usernameprofile)
                                          ->first();
    
      return view('distributor.viewprofile') // common in all
                                          ->with('user',$user)
                                          ->with('allmessages',$allmessages)
                                          ->with('allmessagescount',$allmessagescount)

                                          ->with('userprofile',$userprofile)
                                          ->with('userinfoprofile',$userinfoprofile);

                                           

   }

   public function viewProfilePost(Request $req,$usernameprofile){
       
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
           $userinfoprofile->save();
           $userprofile->save();
          }
          
         return redirect()->route('distributor.viewprofile',$usernameprofile);
      }
      // if($req->submit=="delete"){
      //     $userinfoprofile->delete();
      //     return redirect("/consumer");
      // }
      

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
                               ->get();
   $allmessagescount= announcement::where('receiver','consumer')
                                    ->where('username','not like','%'.$username.'%')
                                       ->count();
    $email=$user->email;
    $report = report::where('sender_email',$email)->get();
    $reportcount = report::where('sender_email',$email)->count();

    return view('distributor.distributorreport') // common in all
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

   $report->sender_email=$user->email;
   $report->subject=$req->subject;
   $report->description=$req->description;
   $report->date=date('Y-m-d');
   $report->status="unsolved";
   $report->save();
   
   return redirect('/distributor/reports');

 
}

   
}

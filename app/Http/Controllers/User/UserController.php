<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index(){

         if(User::UserPermmission() == 0){
            return view('error');
         }else{
            $user = User::all();
            return view('admin.user.index', compact('user'));
         }
        
    }

    public function edit($id){

        if(User::UserPermmission() == 0){
           return view('error');
        }else{
            $ids =  Crypt::decrypt($id);
            $users = User::findOrFail($ids);

            if ($users->name == 'Admin' || $users->email == 'Admin@gmail.com') {
                return Redirect()->back();
             }else {
                return view('admin.user.edit', compact('users'));
             }
           
        }
       
   }

   
   public function update(Request $request,$id){

    $validatedData = $request->validate([
        'name' => 'required|',
        'email' => 'required|',
        
    ]);


    if(User::UserPermmission() == 0){
        return view('error');
     }else{
        $ids =  Crypt::decrypt($id);
        $users = User::findOrFail($ids);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->is_admin = $request->is_admin;
    
        
    
    
        if(empty($request->password && $request->cpassword )){
            $users->save();
            $notification=array(
                'messege'=>'User Update successfully!',
                'alert-type'=>'success'
                 );
                 return Redirect()->route('user')->with($notification);
              
        }else{
            if($request->cpassword == $request->password  ){
                
                $users->password = Hash::make($request->password);
                $users->save();
                $notification=array(
                    'messege'=>'User Update successfully!',
                    'alert-type'=>'success'
                     );
                     return Redirect()->route('user')->with($notification);
    
            }else{
                $notification=array(
                    'messege'=>'User Password Not Match !',
                    'alert-type'=>'error'
                     );
                     return Redirect()->back()->with($notification);
            }
    
        }

        
     }
    

    

   
    


}

    public function delete($id){

        if(User::UserPermmission() == 0){
            return view('error');
         }else{
             $ids =  Crypt::decrypt($id);
             $users = User::findOrFail($ids);
             if (!is_null($users)) {
                 if ($users->name == 'Admin' || $users->email == 'Admin@gmail.com') {
                    return Redirect()->back();
                 }else {
                    $users->delete();
                     $notification=array(
                        'messege'=>'User Delete successfully!',
                        'alert-type'=>'success'
                        );
                     return Redirect()->back()->with($notification);
                 }
             }
         }
            
         }
        

        
        
       
    



}

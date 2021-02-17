<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddNewUserRequest;


class userController extends Controller
{
    public function index(){
        // if (auth()->check()) {}
        $user = auth()->user();
        $id = $user->id;
        $user=Users::where('id',$id)->selection()->first();
        if($user->role_id==1){
           $role_name='admin';
        }else if($user->role_id==2){
            $role_name='manager';

        }else if($user->role_id==3){
            $role_name='employee';
            
        }else if($user->role_id==4){
            $role_name='accountant';   
        }
        return view('admin.userManagment.myprofile',compact(['user','role_name']));
    }
    public function create(){
        return view('admin.userManagment.register');

    }
    public function store(AddNewUserRequest $request){
        try{
          
            // if($request->role=='admin'){
            //     $role_id=1;
            //  }else 
            // return $request->all();
            $role_id=0;
             if($request->role_name=='manager'){
                $role_id=2;
     
             }else if($request->role_name=='accountant'){
                $role_id=4;
                 
             }else if($request->role_name=='employee'){
                $role_id=3;  
             }
            
             $user=Users::create(
               [
                   'role_id'=>$role_id,
                   'f_name'=>$request->f_name,
                   'm_name'=>$request->m_name,
                   'l_name'=>$request->l_name,
                   'username'=>$request->username,
                   'age'=>$request->age,
                   'phone'=>$request->phone,
                   'email'=>$request->email,
                   'address'=>$request->address,
                   'start_date'=>$request->start_date,
                   'password'=> bcrypt($request->password),
               ]
           );
             return redirect()->route('admin.userManagment')->with(['success'=>'تم الحفظ بنجاح']);
           }catch(\Exception $ex){
               
               return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
           }
    }
    public function userManagment(){
        $user=Users::selection()->paginate(PAGINATION_COUNT);
        return view('admin.userManagment.usermanagment', compact("user"));
    }
    public function rdit(){

    }
}

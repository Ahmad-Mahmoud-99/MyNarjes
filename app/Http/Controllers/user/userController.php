<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddNewUserRequest;
use App\Http\Requests\UpdateUserRequest;


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
        return view('admin.userManagment.addNewUser');

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

              Users::create(
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
        return view('admin.userManagment.usermanagment', compact('user'));
    }
    public function edit($user_id){
        try{
            $user=Users::where('id',$user_id)->selection()->first();
             if(!$user){
                 return redirect()->route('admin.userManagment')->with(['error'=>'هذاالمريض غير موجود']);
             }
             return view('admin.userManagment.editUserProfile',compact('user'));
          }catch(\Exception $ex){
             return redirect()->back()->with(['error'=>'هناك خطأ مل يرجى المحاولة فيما بعد']);
           }
    }
    public function update(UpdateUserRequest $request ,$user_id){
        try{
            // return "llllll";
            $role_id=0;
            if($request->role_name=='manager'){
               $role_id=2;

            }else if($request->role_name=='accountant'){
               $role_id=4;

            }else if($request->role_name=='employee'){
               $role_id=3;
            }
            if($request->has('password')){
               Users::where('id',$user_id)
               ->update(
                  [
                    "password"=>bcrypt($request["password"]),
                  ]
               );
            }
            if($request->status=='not active'){
                $status=0;
            }else{
                $status=1;
            }
            Users::where('id',$user_id)
           ->update(
              [
                'role_id'=>$role_id,
                  "f_name"=>$request["f_name"],
                  "m_name"=>$request["m_name"],
                  "l_name"=>$request["l_name"],
                  "age"=>$request["age"],
                  "address"=>$request["address"],
                  "phone"=>$request["phone"],
                  "email"=>$request["email"],
                  "username"=>$request["username"],
                  "end_date"=>$request["end_date"],
                  "status"=>$status,
              ]
           );
           return redirect()->route('admin.userManagment')->with(['success'=>'تم الحفظ بنجاح']);
        }catch(\Exception $ex){
            return $ex;
           return redirect()->back()->with(['error'=>'هناك خطأ مل يرجى المحاولة فيما بعد']);
         }
    }

    public function filter(Request $request){
        if($request->role == 0){
            $user=Users::selection()->paginate(PAGINATION_COUNT);
        }else{
            $user= Users::where('role_id', $request->role)->paginate(PAGINATION_COUNT);
        }
        return view('admin.userManagment.usermanagment', compact("user"));
    }

    public function search(Request $request){
        try{
            $q=$request->name;
            $user=Users::where('f_name','LIKE','%'.$q.'%')->orWhere('m_name','LIKE','%'.$q.'%')->orWhere('l_name','LIKE','%'.$q.'%')->orWhere('username','LIKE','%'.$q.'%')->paginate(PAGINATION_COUNT);
            return view('admin.userManagment.usermanagment', compact("user"));
        }catch(\Exception $ex){
            return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
        }
    }


}

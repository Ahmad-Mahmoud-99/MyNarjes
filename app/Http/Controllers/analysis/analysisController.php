<?php

namespace App\Http\Controllers\analysis;

use App\Models\Analysis;
use App\Models\Inputs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class analysisController extends Controller
{
    public function index(){
        $analysis=Analysis::selection()->paginate(PAGINATION_COUNT);
        return view('admin.analysis.viewAnalysis', compact("analysis"));
    }

    public function filter(Request $request){
        if($request->group == 0){
            $analysis=Analysis::selection()->paginate(PAGINATION_COUNT);
        }else{
            $analysis= Analysis::where('group_id', $request->group)->paginate(PAGINATION_COUNT);
            $pagination = $analysis->appends ( array (
                'group' => $request->group,
        ) );
        }
        return view('admin.analysis.viewAnalysis', compact("analysis"));
    }
    public function search(Request $request){
     try{
       $q=$request->name;
       $analysis=Analysis::where('analysis_name','LIKE','%'.$q.'%')->orWhere('price','LIKE','%'.$q.'%')->paginate(PAGINATION_COUNT);
       $pagination = $analysis->appends ( array (
        'name' => $request->name,
        ) );
       return view('admin.analysis.viewAnalysis', compact("analysis"));
     }catch(\Exception $ex){
        return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
     }
    }
     public function viewForm($analysis_id){
      try{
        $analysis_fields=Inputs::where('analysis_id',$analysis_id)->get();
        $analysis=Analysis::where('analysis_id',$analysis_id)->get();
        return view('admin.analysis.viewForm', compact('analysis_fields'),compact('analysis'));
      }catch(\Exception $ex){
        return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
      }
     }
     public function createForm(){
        return view('admin.analysis.createNewForm');
     }
     public function storeForm(){
        try{

        //     $input=Inputs::create(
        //        [
        //            'f_name'=>$request->f_name,
        //            'm_name'=>$request->m_name,
        //            'l_name'=>$request->l_name,
        //            'age'=>$request->age,
        //            'phone'=>$request->phone,
        //            'email'=>$request->email,
        //            'address'=>$request->address,
        //            'gender'=>$request->gender,
        //            'birthday'=>$request->birthday,
        //        ]
        //    );

        //    return redirect()->route('admin.viewAnalysis')->with(['success'=>'تم الحفظ بنجاح']);
           }catch(\Exception $ex){
               return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
           }
     }


}

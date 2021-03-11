<?php
namespace App\Http\Controllers\analysis;
use DB;
use App\Models\Analysis;
use App\Models\Inputs;
use App\Models\NormalRange ;
use Illuminate\Http\Request;
use App\Http\Requests\NewFormRequest;
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
             $normal_range =NormalRange::with('input','analysis')->where('analysis_id',$analysis_id)->get();
             $analysis=$normal_range[0]->analysis;
        return view('admin.analysis.viewForm',compact('analysis','normal_range'));
      }catch(\Exception $ex){
        return $ex;
        return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
      }
     }
     public function createForm(){
        return view('admin.analysis.createNewForm');
     }
     public function storeForm(NewFormRequest $request){
        try{
            $analysis_name=$request->analysis_name;
           $group_id=$request->group;
           $price=$request->price;
           DB::beginTransaction();
            $analysis_id=Analysis::insertGetId(
            [
                'analysis_name'=>$analysis_name,
                'price'=>$price,
                'group_id'=>$group_id,
            ]
           );

           $input_name=$request->input;
           $max_normal=$request->max_normal;
           $min_normal=$request->min_normal;

           for($count=0 ;$count <count($input_name);$count++){
              $data=array(
                'input_name'=>$input_name[$count],
                'analysis_id'=>$analysis_id
              );
            $insert_data[]=$data;
           }
           foreach($insert_data as $in_d){
              $input_id[]=Inputs::insertGetId($in_d);
           }
            for($count=0 ;$count <count($input_name);$count++){
              $data=array(
                'high_range'=>$max_normal[$count],
                'low_range'=>$min_normal[$count],
                'analysis_id'=>$analysis_id,
                'input_id'=>$input_id[$count]
              );
            $insert_data2[]=$data;
           }
           NormalRange::insert($insert_data2);
           DB::commit();

           return redirect()->route('admin.showAnalysis')->with(['success'=>'تم الحفظ بنجاح']);
           }catch(\Exception $ex){
            DB::rollback();
            return $ex;
               return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
           }
     }
     public function updateForm($analysis_id,NewFormRequest $request){
        return "jjj";
     }


}

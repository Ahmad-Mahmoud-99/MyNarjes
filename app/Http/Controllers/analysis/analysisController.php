<?php
namespace App\Http\Controllers\analysis;
use DB;
use App\Models\Analysis;
use App\Models\Inputs;
use App\Models\NormalRange ;
use Illuminate\Http\Request;
use App\Http\Requests\NewFormRequest;
use App\Http\Requests\UpdateFormRequest;
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
      
        return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
      }
     }
     public function createForm(){
        return view('admin.analysis.createNewForm');
     }
     public function AddNewInputs($analysis_id){
       try{
          $analysis=Analysis::where('analysis_id',$analysis_id)->get();
          return view('admin.analysis.addNewInputs',compact('analysis'));
        }catch(\Exception $ex){
        return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
        }
   }
   public function storeNewInputs($analysis_id,NewFormRequest $request){
    return "kkk";
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
               return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
           }
     }
     
    public function analysisUpdateForm(UpdateFormRequest $request,$analysis_id){
         try{
          DB::beginTransaction();
          Analysis::where('analysis_id',$analysis_id)
          ->update(
             [
                 "price"=>$request["price"],
                 "group_id"=>$request["group"],
             ]
          );

          $input_name=$request->input_name;
          $max_normal=$request->max_normal;
          $min_normal=$request->min_normal;

          for($count=0 ;$count <count($input_name);$count++){
             $data[]= $input_name[$count];
          }
          $input_id=Inputs::where('analysis_id',$analysis_id)->get('input_id');
            for($i=0;$i<count($input_id);$i++){
              Inputs::where(['analysis_id'=>$analysis_id,'input_id'=>$input_id[$i]->input_id])->update(['input_name'=>$data[$i]]);
            }
          
           for($count=0 ;$count <count($input_name);$count++){
             $data2=array(
               'high_range'=>$max_normal[$count],
               'low_range'=>$min_normal[$count],
               'analysis_id'=>$analysis_id,
               'input_id'=>$input_id[$count]->input_id
             );
           $insert_data2[]=$data2;
          }
          foreach($insert_data2 as $index){
            NormalRange::where(['analysis_id'=>$analysis_id,'input_id'=>$index['input_id']])->update([
              'high_range'=>$index['high_range'],
              'low_range'=>$index['low_range'],
            ]);
          }
          DB::commit();

          return redirect()->route('admin.showAnalysis')->with(['success'=>'تم التعديل بنجاح']);
         }catch(\Exception $ex){
            DB::rollback();
               return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
           }

    }


}

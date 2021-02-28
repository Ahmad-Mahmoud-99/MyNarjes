<?php

namespace App\Http\Controllers\financial;

use App\Http\Controllers\Controller;
use App\Models\Analysis;
use App\Http\Requests\updatePriceRequest;

use Illuminate\Http\Request;

class financialController extends Controller
{
    public function index (){
        $analysis = Analysis::select('analysis_id', 'analysis_name', 'price')->paginate(PAGINATION_COUNT);
        return view('admin.financialDetails.laboratoryAnalysisPrice', compact('analysis'));
    }

    public function search(Request $request){
        try{
            $q=$request->name;
            $analysis=Analysis::where('analysis_name','LIKE','%'.$q.'%')->paginate(PAGINATION_COUNT);
            $pagination = $analysis->appends ( array (
                'name' => $request->name,
            ) );
            return view('admin.financialDetails.laboratoryAnalysisPrice', compact("analysis"));
        }catch(\Exception $ex){
            return $ex;
            return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
        }
    }

    public function edit($analysis_id){
        try{
            $analysis=Analysis::where('analysis_id',$analysis_id)->selection()->first();
            if(!$analysis){
                return redirect()->route('admin.laboratoryDetails')->with(['error'=>'هذا التحليل غير موجود']);
            }
            return view('admin.financialDetails.editPrice',compact('analysis'));
        }catch(\Exception $ex){
            return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى المحاولة فيما بعد']);
        }
    }

    public function update(updatePriceRequest $req,$analysis_id){
        try{

            Analysis::where('analysis_id',$analysis_id)
                ->update(
                    [
                        "price"=>$req["price"],

                    ]
                );

            return redirect()->route('admin.laboratryAnalysisPrice')->with(['success'=>'تم التعديل بنجاح']);
        }catch(\Exception $ex){
               return $ex;
            return redirect()->back()->with(['error'=>'هناك خطأ مل يرجى المحاولة فيما بعد']);
        }
    }

}

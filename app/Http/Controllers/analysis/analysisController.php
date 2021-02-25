<?php

namespace App\Http\Controllers\analysis;

use App\Models\Analysis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class analysisController extends Controller
{
    public function index(){
        $analysis=Analysis::selection()->paginate(PAGINATION_COUNT);
        return view('admin.analysis.viewAnalysis', compact("analysis"));
    }

    public function filter(Request $request){

    }
    public function search(Request $request){
    try{
       $q=$request->name;
       $analysis=Analysis::where('analysis_name','LIKE','%'.$q.'%')->orWhere('price','LIKE','%'.$q.'%')->paginate(PAGINATION_COUNT);
       return view('admin.analysis.viewAnalysis', compact("analysis"));
    }catch(\Exception $ex){
        return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
    }
    }

}

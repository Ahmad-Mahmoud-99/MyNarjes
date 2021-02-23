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
       // return $request->all();
    }

}

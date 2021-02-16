<?php

    namespace App\Http\Controllers\patient;
    use App\Models\Patient;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Requests\patientManagmentRequest;

    class patientManagmentController extends Controller
    {
        public function index(){
            $patient=Patient::selection()->paginate(PAGINATION_COUNT);
            return view('admin.patientmanagment.PatientsManagment', compact("patient"));
        }

        public function edit($patient_id){
         try{
           $patient=Patient::where('patient_id',$patient_id)->selection()->first();
            if(!$patient){
                return redirect()->route('admin.patientManagment')->with(['error'=>'هذاالمريض غير موجود']);
            }
            return view('admin.patientmanagment.UpdatePInformation',compact('patient'));
         }catch(\Exception $ex){
            return redirect()->back()->with(['error'=>'هناك خطأ مل يرجى المحاولة فيما بعد']);
        }
        }
         public function update(patientManagmentRequest $request,$patient_id){
            try{
               Patient::where('patient_id',$patient_id)
              ->update(
                 [
                     "f_name"=>$request["f_name"],
                     "m_name"=>$request["m_name"],
                     "l_name"=>$request["l_name"],
                     "age"=>$request["age"],
                     "address"=>$request["address"],
                     "phone"=>$request["phone"],
                     "email"=>$request["email"],
                 ]
              );
             return redirect()->route('admin.patientManagment')->with(['success'=>'تم التعديل بنجاح']);
              }catch(\Exception $ex){
                  return $ex;
              return redirect()->back()->with(['error'=>'هناك خطأ مل يرجى المحاولة فيما بعد']);
            }
          }
         }
    

<?php

    namespace App\Http\Controllers\patient;
    use App\Models\Analysis_requierd;
    use App\Models\Patient;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Requests\UpdatePatientRequest;
    use App\Http\Requests\AddPatientRequest;

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
         public function update(UpdatePatientRequest $request,$patient_id){
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
                //   return $ex;
              return redirect()->back()->with(['error'=>'هناك خطأ مل يرجى المحاولة فيما بعد']);
            }
    }
    public function create(){
        return view('admin.patientmanagment.AddPatients');
    }
    public function store(AddPatientRequest $request){
        try{
             $patient=Patient::create(
                [
                    'f_name'=>$request->f_name,
                    'm_name'=>$request->m_name,
                    'l_name'=>$request->l_name,
                    'age'=>$request->age,
                    'phone'=>$request->phone,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'gender'=>$request->gender,
                    'birthday'=>$request->birthday,
                ]
            );

            return redirect()->route('admin.patientManagment')->with(['success'=>'تم الحفظ بنجاح']);
            }catch(\Exception $ex){
                return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
            }
    }
    public function search(Request $request){
        try{
            $q=$request->name;
            $patient=Patient::where('f_name','LIKE','%'.$q.'%')->orWhere('m_name','LIKE','%'.$q.'%')->orWhere('l_name','LIKE','%'.$q.'%')->paginate(PAGINATION_COUNT);
            $pagination = $patient->appends ( array (
                'name' => $request->name,
        ) );
            return view('admin.patientmanagment.PatientsManagment', compact("patient"));
        }catch(\Exception $ex){
            return $ex;
            return redirect()->back()->with(['error'=>'هناك خطأ ما يرجى اعادة المحاولة']);
        }
    }

    public function history($id){
       $analysis = Analysis_requierd::where('patient_id', $id)->with('doctor','analysis')->get();

        return view('admin.patientmanagment.patientHistory' ,compact("analysis"));
    }


 }


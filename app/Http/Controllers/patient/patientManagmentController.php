<?php

    namespace App\Http\Controllers\patient;
    use App\Models\Patient;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class patientManagmentController extends Controller
    {
        public function index(){
            $patient=Patient::selection()->paginate(PAGINATION_COUNT);
            return view('admin.patientmanagment.PatientsManagment', compact("patient"));
        }
    }

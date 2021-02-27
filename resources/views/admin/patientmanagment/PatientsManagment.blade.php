@extends('layouts.admin')
@section('title','Patient Manangment')
@section('dash','Patient Manangment')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">manage_accounts</i>
                    </div>
                    <h4 class="card-title">Patients Managment</h4>
                </div>
                <div class="col-md-3"style="margin-left: 75%;margin-right: 600px ;">
                    <form class="navbar-form" method="get" action="{{route('admin.patient.search')}}">
                        @csrf
                        <div class="input-group no-border">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Search..." style="margin-top: 6px;">
                            <button type="submit" class="btn btn-rose btn-round btn-just-icon" >
                                <i class="material-icons" style="padding-top: 1px;padding-left: 1px;padding-right: 1px;padding-botton: 4px;">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                @include('alert.success')
                @include('alert.errors')
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Birthday</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($patient)
                                @foreach($patient as $index)
                                    <tr>
                                        <td>{{$index->patient_id}}</td>
                                        <td>{{$index->f_name}}</td>
                                        <td>{{$index->m_name}}</td>
                                        <td>{{$index->l_name}}</td>
                                        <td>{{$index->gender}}</td>
                                        <td>{{$index->age}}</td>
                                        <td>{{$index->address}}</td>
                                        <td>{{$index->email}}</td>
                                        <td>{{$index->phone}}</td>
                                        <td>{{$index->birthday}}</td>
                                        <td class="td-actions text-right">
                                           <a href="{{route('admin.patientManagment.edit',$index->patient_id)}}">
                                              <button type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                              </button>
                                            </a>
                                            <a href="{{route('admin.patientManagment.history',$index->patient_id)}}">
                                                <button type="button" rel="tooltip" class="btn btn-danger">
                                                    <i class="material-icons">history</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                            @endisset
                            </tbody>



                        </table>

                        <div class="d-flex justify-content-center"> {!! $patient->links() !!} </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>


@endsection

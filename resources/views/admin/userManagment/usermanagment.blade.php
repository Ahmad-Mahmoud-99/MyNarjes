
@extends('layouts.admin')
@section('title','User Managment')
@section('dash','User Managment')
@section('content')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">manage_accounts</i>
                  </div>
                  <h4 class="card-title">Users Management</h4>
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
                                <th>username</th>
                                <th>start_date</th>
                                <th>end_date</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($user)
                                @foreach($user as $index)
                                    <tr>
                                        <td>{{$index->id}}</td>
                                        <td>{{$index->f_name}}</td>
                                        <td>{{$index->m_name}}</td>
                                        <td>{{$index->l_name}}</td>
                                        <td>{{$index->gender}}</td>
                                        <td>{{$index->age}}</td>
                                        <td>{{$index->address}}</td>
                                        <td>{{$index->email}}</td>
                                        <td>{{$index->phone}}</td>
                                        <td>{{$index->username}}</td>
                                        <td>{{$index->start_date}}</td>
                                        <td>{{$index->end_date}}</td>
                                        <td class="td-actions text-right">
                                           <a href=""> 
                                              <button type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                              </button>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                            @endisset
                            </tbody>
                    </table>
                    <div class="d-flex justify-content-center"> {!! $user->links() !!} </div>
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection
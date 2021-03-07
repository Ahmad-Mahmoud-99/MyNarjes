
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
                  <br>
                </div>
                  <div class="col-md-12 col-xs-12">

                  <div class="row">

                      <form class="navbar-form  col-md-8 " name="role" method="get" action="{{route('admin.user.filter')}}">
                          @csrf
                          <div class="row" style="padding-right:60px;">
                          <div class="col-md-4 col-xs-12">
                          <select class="selectpicker " name="role" data-style="select-with-transition" title="Role Name" data-size="7">
                              <option disabled>Roles</option>
                              <option selected value="0">ALL ROLES </option>
                              <option value="1">ADMIN </option>
                              <option value="2">MANAGER</option>
                              <option value="3">EMPLOYEE</option>
                              <option value="4">ACOUNTANT</option>
                          </select>

                          </div>

                          <div class=" col-md-4 col-xs-12">

                          <button ype="submit" class="btn btn-rose" style="padding:10px;" >
                              Filter
                              <!-- <div class="ripple-container"></div> -->
                          </button>
</div>
</div>
                      </form>
                      <form class="navbar-form col-md-4 col-xs-12" method="get" action="{{route('admin.user.search')}}">
                          @csrf
                          <div class="input-group no-border">

                              <input type="text" name="name" value="{{old('name')}}" class="form-control tool" placeholder="Search..." style="margin-top: 6px;">
                              <button type="submit" class="btn btn-rose btn-round btn-just-icon" >
                                  <i class="material-icons"  style="padding-top: 1px;padding-left: 1px;">search</i>
                                  <div class="ripple-container"></div>
                              </button>
                          </div>

                      </form>
</div>
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
                                <th>role_name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>username</th>
                                <th>status</th>
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
                                        @if($index->role_id==1)
                                        <td>admin</td>
                                        @elseif($index->role_id==2)
                                        <td>manager</td>
                                        @elseif($index->role_id==3)
                                        <td>employee</td>
                                        @elseif($index->role_id==4)
                                        <td>accountant</td>
                                        @endif
                                        <td>{{$index->age}}</td>
                                        <td>{{$index->address}}</td>
                                        <td>{{$index->email}}</td>
                                        <td>{{$index->phone}}</td>
                                        <td>{{$index->username}}</td>
                                        <td>{{$index->getActive()}}</td>

                                        <td>{{$index->start_date}}</td>
                                        <td>{{$index->end_date}}</td>
                                        <td class="td-actions text-right">
                                           <a href="{{route('admin.userManagment.edit',$index->id)}}">
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
  

@endsection

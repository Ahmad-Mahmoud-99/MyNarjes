
 @extends('layouts.admin')
@section('title','Edit Users Profile')
@section('dash','Edit profile')
@section('content')
          <div class="row">
            <div class="col-md-8" style="margin: auto;">
              <div class="card" style="width:120%; margin-left: -40px;">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                  </div>
                  <h4 class="card-title">Edit Profile -
                    <small class="category">Complete your profile</small>
                  </h4>
                </div>
                <div class="card-body">
                  <form class="form" method="post" action="{{route('admin.userManagment.update',$user->id)}}">
                     @csrf
                   <br> <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First name</label>
                          <input type="text" name="f_name" value="{{$user->f_name}}" class="form-control">
                          @error('f_name')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Middle name</label>
                          <input type="text" class="form-control" name="m_name"   value="{{$user->m_name}}">
                          @error('m_name')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Last name</label>
                          <input type="text" class="form-control" name="l_name"  value="{{$user->l_name}}">
                          @error('l_name')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                    </div>
                    <br>
                    
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" >User name</label>
                          <input type="text" class="form-control" name="username" value="{{$user->username}}">
                          @error('username')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" value="">
                          @error('password')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" name="email" value="{{$user->email}}">
                          @error('email')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                    </div>
                    <br>
                   
                    
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">phone</label>
                          <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                          @error('phone')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">

                          <select  name="role_name"  class="selectpicker" data-background-color="rose" data-style="select-with-transition" data-size="7">
                            <option disabled  value="role">role</option>
                             <option value="manager" @if($user->role_id==2)selected @endif>Manager</option>
                             <option value="employee" @if($user->role_id==3)selected @endif>Employee</option>
                             <option value="accountant" @if($user->role_id==4)selected @endif>Accountant</option>
                         
                          </select>
                          <br>
                          @error('role_name')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                           <br>
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="address" value="{{$user->address}}">
                          @error('address')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                    </div>
<br>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">age</label><br>
                          <input type="text" class="form-control" name="age" value="{{$user->age}}">
                          @error('age')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Start date</label><br>
                          <input disabled type="text" class="form-control" name="start_date" value="{{$user->start_date}}">
                          @error('start_date')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">End date</label><br>
                          <input type="date" class="form-control" name="end_date" value="{{$user->end_date}}">
                          @error('end_date')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <select  name="status"  class="selectpicker" data-background-color="rose" data-style="select-with-transition" data-size="7">
                            <option disabled  value="status">status</option>
                             <option value="active" @if($user->status==1)selected @endif>active</option>
                             <option value="not active" @if($user->status==0)selected @endif>not active</option>
                         
                          </select>
                          <br>
                          @error('role_name')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                     </div>
                    <br>
                    <button type="submit" class="btn btn-rose"style="width: 30%;" >Update Profile</button>
                    <div class="clearfix"></div>
                    <br>
                  </form>
                </div>
              </div>
            </div>
        
          </div>
       @endsection
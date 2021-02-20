
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
                  <form>

                   <br> <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First name</label>
                          <input type="text" name="f_name" value="{{$user->f_name}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Middle name</label>
                          <input type="text" class="form-control" name="m_name"   value="{{$user->m_name}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Last name</label>
                          <input type="text" class="form-control" name="l_name"  value="{{$user->l_name}}">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" >User name</label>
                          <input type="text" class="form-control" name="username" value="{{$user->username}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" value="{{$user->password}}">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" name="email" value="{{$user->email}}">
                        </div>
                      </div>
                    </div>
                    <br>
                   
                    
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">phone</label>
                          <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Role</label>
                          <input type="text" class="form-control" name="role" value="{{$user->role}}">
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="address" value="{{$user->address}}">
                        </div>
                      </div>
                    </div>
<br>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">age</label><br>
                          <input type="text" class="form-control" name="age" value="{{$user->age}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Start date</label><br>
                          <input disabled type="text" class="form-control" name="start_date" value="{{$user->start_date}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">End date</label><br>
                          <input type="date" class="form-control" name="end_date" value="{{$user->end_date}}">
                        </div>
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-rose"style="width: 30%; " >Update Profile</button>
                    <div class="clearfix"></div>
                    <br>
                  </form>
                </div>
              </div>
            </div>
        
          </div>
       @endsection
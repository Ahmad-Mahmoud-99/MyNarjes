@extends('layouts.admin')
@section('title','Add Patient')
@section('dash','Add New Patient')
@section('content')
<div class="row" >
            <div class="col-md-8" style="margin: auto;">
              <div class="card" style="width:120%; margin-left: -40px;">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">person_add</i>
                  </div>
                  <h4 class="card-title">Add Patient </h4>
                </div>
                <br>
                @include('alert.success')
                 @include('alert.errors')
                 <br>
                <div class="card-body" >
                <form class="form" method="post" action=" {{route('admin.patientManagment.store')}}">
                   @csrf
                   <div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" class="form-control"  name="f_name" >
                          @error('f_name')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input type="text" class="form-control" name="m_name"   >
                        
                          @error('m_name')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" name="l_name"  >
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
                        <select name="gender" class="selectpicker" data-background-color="rose" data-style="select-with-transition" data-size="7">
                            <option disabled selected value="gender">gender</option>
                            <option value="male">Male </option>
                            <option value="female">Female</option>
                          </select>

                          @error('gender')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input type="text" class="form-control"  name="age"  >
                          @error('age')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                        <!-- <label class="bmd-label-floating">Birthday</label> -->
                        <input type="date" class="form-control"  name="birthday">
                        @error('birthday')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>


                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Address</label>
                          <input type="text" class="form-control"  name="address"  >
                          @error('address')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input type="text" class="form-control"  name="phone"  >
                          @error('phone')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" name="email"  >
                          @error('email')
                              <span class="text-danger">{{$message}} </span>
                           @enderror
                        </div>
                      </div>
                    </div>
                   <br><br>
                    <button type="submit" class="btn btn-rose " style="width:30% ">Add</button>
                    <div class="clearfix">
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

@endsection
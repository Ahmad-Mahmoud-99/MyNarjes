@extends('layouts.admin')
@section('title','Add Patient')
@section('dash','Add New Patient')
@section('content')
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="widyh:120%;margin-left: -40px;">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">person_add</i>
                  </div>
                  <h4 class="card-title">Add Patient </h4>
                </div>
                <div class="card-body" >
                  <form>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                         
                          <input type="Date" class="form-control">
                        </div>
                      </div>
                    </div>
                    <br>

                  
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Address</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control">
                        </div>
                      </div>
                    </div>
                   <br><br>
                    <button type="submit" class="btn btn-rose " style="margin-left: 250px;width:30% ">Add</button>
                    <div class="clearfix"></div> <br><br>
                  </form>
                </div>
              </div>
            </div>
          </div>

@endsection
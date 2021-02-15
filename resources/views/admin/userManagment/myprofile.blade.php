@extends('layouts.admin')
@section('title','My Profile')
@section('dash','My Profile')
@section('content')
<div class="row">
        <div class="col-md-8" style="margin: auto;">
              <div class="card" style="width:120%; margin-left: -40px;">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                  </div>
                  <h4 class="card-title">My Profile
                    
                  </h4>
                  <br>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">First Name :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled" disabled>
                        </div>
                      </div>
                      <label class="col-sm-3 col-form-label">Middle Name :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled " disabled>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Last Name :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled " disabled>
                        </div>
                      </div>
                      <label class="col-sm-3 col-form-label">User Name :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled" disabled>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Password :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled " disabled>
                        </div>
                      </div>
                      <label class="col-sm-3 col-form-label"> User Email :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled " disabled>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Address :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled" disabled>
                        </div>
                      </div>
                      <label class="col-sm-3 col-form-label"> User Role : </label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled " disabled>
                        </div>
                      </div>
                      
                    </div>
                    <br>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Start Date :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled" disabled>
                        </div>
                      </div>
                      <label class="col-sm-3 col-form-label">End Date :</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled " disabled>
                        </div>
                      </div>
                      
                    </div>
                    <br><br>

                  </form>
                </div>
              </div>
 
@endsection
@extends('layouts.admin')
@section('title','Laboratory Analysis Price')
@section('content')

<div class="row" >
            <div class="col-md-8" style="margin: auto;">
              <div class="card" style="width: 90%;" >
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">paid</i>
                  </div>
                  <h4 class="card-title">Laboratory Analysis Price </h4>

                  <div class="col-lg-5 col-md-4 col-sm-2" style="margin-left:63%;margin-right: 600px ;">
                    <form class="navbar-form" action="{{route('admin.laboratoryDetails.search')}}">
                      <div class="input-group no-border">
                        <input type="text" value="" name="name" class="form-control" placeholder="Search By Analysis Name" style="margin-top: 6px;">
                        <button type="submit" class="btn btn-rose btn-round btn-just-icon" >
                          <i class="material-icons" style="padding-top: 4px;padding-left: 8px;">search</i>
                          <div class="ripple-container"></div>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="table-responsive">
                    @include('alert.success')
                    @include('alert.errors')

                    <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center" style="width: 30%;">Analysis Name</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @isset($analysis)
                        @foreach($analysis as $test)

                    <tr>
                        <td class="text-center">{{$test->analysis_id}}</td>
                        <td class="text-center">{{$test->analysis_name}}</td>
                        <td class="text-center">{{$test->price}}</td>
                        <td class="td-actions text-center">
                            <a href="{{route('admin.laboratoryDetails.edit',$test->analysis_id)}}">
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
                    <div class="d-flex justify-content-center"> {!! $analysis->links() !!} </div>


                </div>
              </div>
            </div>
          </div>
@endsection

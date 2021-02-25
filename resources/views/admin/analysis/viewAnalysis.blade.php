@extends('layouts.admin')
@section('title','Show Analysis')
@section('content')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Show Analysis</h4>
                  <div class="col-lg-3 col-md-4 col-sm-2" style="margin-left: 75%;margin-right: 600px ;">
                    <select class="selectpicker" data-style="select-with-transition" title="Group Name" data-size="7">
                      <option disabled>Group Analysis</option>
                        <option selected value="0">ALL ANALYSIS </option>
                      <option value="1">BIOCHEMISTRY </option>
                      <option value="2">SEROLOGY</option>
                      <option value="3">HEAMTOLOGY</option>
                      <option value="4">URINE ANALYSIS</option>
                      <option value="5">DIFFERENTIAL </option>
                      <option value="6">STOOLANALYSIS</option>
                      <option value="7">CULTURE </option>
                      <option value="8">OTHERS</option>
                    </select>
                    <br>
                    <form class="navbar-form" method="post" action="{{route('admin.search')}}">
                     @csrf
                      <div class="input-group no-border">
                        <input type="text" name="name" value="" class="form-control" placeholder="Search..." style="margin-top: 6px;">
                        <button type="submit" class="btn btn-rose btn-round btn-just-icon" >
                          <i class="material-icons" style="padding-top: 4px;padding-left: 8px;">search</i>
                          <div class="ripple-container"></div>
                        </button>
                      </div>
                    </form>
                  </div>

                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr >
                          <th class="text-center">ID</th>
                          <th >Analysis Name</th>
                          <th>Price Analysis </th>
                          <th>Group Name </th>
                          <th>Count</th>
                          <th>Actions</th>
                          </tr>
                      </thead>
                        <tbody>
                        @isset($analysis)
                            @foreach($analysis as $test)
                                <tr>
                                    <td>{{$test->analysis_id}}</td>
                                    <td>{{$test->analysis_name}}</td>
                                    <td>{{$test->price}}</td>
                                    <td>{{$test->group->group_name}}</td>
                                    <td>{{$test->count}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>

                    </table>

                  </div>

                </div>
              </div>
            </div>


        </div>
@endsection

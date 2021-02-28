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
                  <br>
                  <div class="col-md-12 " >
                     <div class="row"> 
                  <form class="navbar-form col-md-8" method="get" action="{{route('admin.filter')}}">
                          @csrf
                          <div class="row" style="padding-right:60px;">

                    <div class="col-md-4">    
                    <select class="selectpicker" name="group" data-style="select-with-transition" title="Group Name" data-size="7">
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
</div>
                    <div class="col-md-4">
                          <button type="submit" class="btn btn-rose " style="padding:10px">
                              Filter
                             <!-- <div class="ripple-container"></div> -->
                          </button>
                        
</div>
</div>
                      </form>


                    <br>
                    <form class="navbar-form col-md-4" method="get" action="{{route('admin.search')}}">
                     @csrf
                      <div class="input-group no-border ">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Search..." style="margin-top: 6px;">
                        <button type="submit" class="btn btn-rose btn-round btn-just-icon" >
                          <i class="material-icons" style="padding-top: 4px;padding-left: 8px;">search</i>
                          <div class="ripple-container"></div>
                        </button>
                      </div>
                    </form>
                  </div>
</div>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr >
                          <th class="text-center">ID</th>
                          <th class="text-center">Analysis Name</th>
                          <th class="text-center">Price Analysis </th>
                          <th class="text-center">Group Name </th>
                          <th class="text-center">Count</th>
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
                                    <td class="text-center">{{$test->group->group_name}}</td>
                                    <td class="text-center">{{$test->count}}</td>
                                    <td class="td-actions text-center">
                                        <a href="#">
                                            <button type="button" rel="tooltip" class="btn btn-success">
                                               view
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


        </div>
@endsection

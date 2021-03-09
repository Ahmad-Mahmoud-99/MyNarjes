@extends('layouts.admin')
@section('title','Form')
@section('content')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Show Form</h4>
                  <br>
                  <div class="col-lg-12 col-md-4 col-sm-2" >
                     <div class="row"> 
                      <form class="navbar-form col-lg-8" method="get" action="">
                          @csrf
                          <div>
                          @isset($analysis)
                            @foreach($analysis as $index)
                            <label for='{{$index->analysis_name}}'>Analysis Name</label> 
                           <input type='text' name='name' value="{{$index->analysis_name}}">
                           <label for='{{$index->price}}'>Analysis Price</label> 
                           <input type='text' name='price'value="{{$index->price}}">

                           <select class="selectpicker" name="group" data-style="select-with-transition" title="Group Name" data-size="7">
                              <option disabled>Group Analysis</option>
                              <option value="1"@if($index->group_id==1)selected @endif>BIOCHEMISTRY </option>
                              <option value="2"@if($index->group_id==2)selected @endif>SEROLOGY</option>
                              <option value="3"@if($index->group_id==3)selected @endif>HEAMTOLOGY</option>
                              <option value="4"@if($index->group_id==4)selected @endif>URINE ANALYSIS</option>
                              <option value="5"@if($index->group_id==5)selected @endif>DIFFERENTIAL </option>
                              <option value="6"@if($index->group_id==6)selected @endif>STOOLANALYSIS</option>
                              <option value="7"@if($index->group_id==7)selected @endif>CULTURE </option>
                              <option value="8"@if($index->group_id==8)selected @endif>OTHERS</option>
                           </select>
                           @endforeach
                        @endisset
                        <br>
                        <div class="input">
                        @isset($analysis_fields )
                          @foreach($analysis_fields as $test)
                            <div id="remove"> 
                            <!-- normal rang -->
                            @isset($normal_range)
                             @foreach($normal_range as $test)
                              <label for=''>Max-Normal Rang</label> 
                              <input type='text' name='max_normal' value='{{$test->high-range}}'>
                              <label for=''>Min-Normal Rang</label> 
                              <input type='text' name='min_normal' value='{{$test->low_range}}'>
                            @endforeach
                           @endisset
                           
                              <label for='{{$index->input_name}}'>Input Name</label> 
                              <input type='text' name='name' value="{{$test->input_name}}">
                              <button type='button' class='btn btn-danger' onclick='removeRow()'>-</button>
                           </div>
                           
                            @endforeach
                          @endisset
                            <br>
                            <button type="button" class="btn btn-rose"  onclick="addRow()">+</button>
                          </div>
                        <button type="submit" class="btn btn-rose"  >save</button>
                        </div>
                        <br>
                      </form>
                     </div>
                   </div>
                </div>
              </div>
            </div>


        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            
            function addRow(){
              var row="<div id='remove'>"+"<label for=''>Max-Normal Rang</label> "+
                              "<input type='text' name='max_normal' value=''>"+
                              "<label for=''>Min-Normal Rang</label> "+
                              "<input type='text' name='min_normal' value=''>"+
                             
                              "<label for='{{$index->input_name}}'>Input Name</label>"+
                              "<input name='input[]'>"+
                              "<button type='button' class='btn btn-danger' onclick='removeRow()'>-</button>"+"</div>";
            
            $(".input").append(row);
            }
            function removeRow() {
               var myobj = document.getElementById("remove");
                myobj.remove();
            }
        </script>
@endsection

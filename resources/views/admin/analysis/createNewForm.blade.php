@extends('layouts.admin')
@section('title','Create New Analysis')
@section('content')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Create New Form</h4>
                  <br>
                  <div class="col-lg-12 col-md-4 col-sm-2" >
                     <div class="row"> 
                      <form class="navbar-form col-lg-8" method="get" action="{{route('admin.analysis.store')}}">
                          @csrf
                          <label for="input">Analysis Name </label>
                           <input name='input' type="text">
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
                           <label for="input">Price</label>
                           <input name='input' type="text">
                           <br>
                          <div class="input">
                            <div class="remove"> 
                              <label for="input">input name (field)</label>
                              <input name='input' type="text">
                              <button type="button" class="btn btn-rose"  onclick="addRow()">+</button>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-rose">save</button>
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
              var row=" <div id='remove'>"+"<label for='input'>input name (field)</label>"+
                          "<input name='input'>"+
                          "<button type='button' class='btn btn-danger' onclick='removeRow()'>-</button>"+"</div>";
            
            $(".input").append(row);
            }
            function removeRow() {
               var myobj = document.getElementById("remove");
                myobj.remove();
            }
        </script>

@endsection

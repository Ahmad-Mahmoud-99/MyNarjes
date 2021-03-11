@extends('layouts.admin')
@section('title','Add Inputs')
@section('content')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Add Inputs For Analysis</h4>
                  <br>
                  
                 @include('alert.success')
                 @include('alert.errors')
                 <br>
                  <div class="card-body">      
                  
                  @isset($analysis)
                     @foreach($analysis as $analysis)               
                   <form class="navbar-form col-lg-12 form" method="post" action="{{route('admin.analysis.storeInputs',$analysis->analysis_id)}}">
                          @csrf

                            <label for='{{$analysis->analysis_name}}'>Analysis Name</label> 
                           <input type='text' name='name' value="{{$analysis->analysis_name}}">
                           <label for='{{$analysis->price}}'>Analysis Price</label> 
                           <input type='text' name='price'value="{{$analysis->price}}">

                           <select class="selectpicker" name="group" data-style="select-with-transition" title="Group Name" data-size="7">
                              <option disabled>Group Analysis</option>
                              <option value="1"@if($analysis->group_id==1)selected @endif>BIOCHEMISTRY </option>
                              <option value="2"@if($analysis->group_id==2)selected @endif>SEROLOGY</option>
                              <option value="3"@if($analysis->group_id==3)selected @endif>HEAMTOLOGY</option>
                              <option value="4"@if($analysis->group_id==4)selected @endif>URINE ANALYSIS</option>
                              <option value="5"@if($analysis->group_id==5)selected @endif>DIFFERENTIAL </option>
                              <option value="6"@if($analysis->group_id==6)selected @endif>STOOLANALYSIS</option>
                              <option value="7"@if($analysis->group_id==7)selected @endif>CULTURE </option>
                              <option value="8"@if($analysis->group_id==8)selected @endif>OTHERS</option>
                           </select>
                          <div class="input">
                              <label for="input">input name</label>
                              <input name='input[]' type="text" value='{{old("input.0")}}'>
                              @error("input.0")
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                              <label for=''>Max-Range</label> 
                              <input type='text' name='max_normal[]' value='{{old("max_normal.0")}}'>
                              @error("max_normal.0")
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                              <label for=''>Min-Range</label> 
                              <input type='text' name='min_normal[]' value='{{old("min_normal.0")}}'>
                              @error("min_normal.0")
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                              
                              <button type="button" class="btn btn-rose"  id="add" >+</button>
                          </div>
                          <div>
                            <button type="submit" class="btn btn-rose">save</button>
                          </div>
                          <br>
                          <br>

                      </form>
                      
                      @endforeach

                      @endisset
                      
                     </div>
                   
                </div>
              </div>
            </div>
            </div>


        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
      $(document).ready(function(){                
         $(document).on('click','#add',function(){
            var row=" <div class='remove'>"+
                             "<label for='input'>input name </label>"+
                             "<input name='input[]' value=''>"+
                             " @error('input.*')"+
                               " <span class='text-danger'>{{$message}}</span>"+
                             " @enderror"+
                             "<label for=''>Max-Range</label> "+
                              "<input type='text' name='max_normal[]' value=''>"+
                              " @error('max_normal.*')"+
                               " <span class='text-danger'>{{$message}}</span>"+
                             " @enderror"+
                              "<label for=''>Min-Range</label> "+
                              "<input type='text' name='min_normal[]' value=''>"+
                             " @error('min_normal.*')"+
                               " <span class='text-danger'>{{$message}}</span>"+
                             " @enderror"+
                            
                            "<button type='button' class='btn btn-danger' id='remove'>-</button>"+"</div>";
            $('.input').append(row);
        });
        $(document).on('click','#remove',function(){
          $(this).closest('.remove').remove();
        });
      });
           
        </script>

@endsection
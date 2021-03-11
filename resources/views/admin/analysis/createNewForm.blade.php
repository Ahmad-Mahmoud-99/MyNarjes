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
                @include('alert.success')
                 @include('alert.errors')
                 <br>
                  <div class="card-body">                     
                   <form class="navbar-form col-lg-12 form" method="post" action="{{route('admin.analysis.store')}}">
                          @csrf
                     <div class="row"> 
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="analysis_name" class="bmd-label-floating">Analysis Name</label>
                              <input name='analysis_name'class="form-control" type="text" value="{{old('analysis_name')}}">
                             @error("analysis_name")
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                              </div>                                                
                            </div>  
                          <div class="col-md-4 ">
                            <div class="form-group">                                              
                          <select name="group" class="selectpicker" name="group" group-title="Group Name" data-style="select-with-transition" title="Group Name" data-size="7">
                             <option disabled>Group Analysis</option>
                            @if (old('group') == '1')
                              <option value="1" selected>BIOCHEMISTRY</option>
                            @else
                             <option value="1">BIOCHEMISTRY</option>
                            @endif
                            @if (old('group') == '2')
                              <option value="2" selected>SEROLOGY</option>
                            @else
                             <option value="2">SEROLOGY</option>
                            @endif
                            @if (old('group') == '3')
                              <option value="3" selected>HEAMTOLOGY</option>
                            @else
                             <option value="3">HEAMTOLOGY</option>
                            @endif
                            @if (old('group') == '4')
                              <option value="4" selected>URINE ANALYSIS</option>
                            @else
                             <option value="4">URINE ANALYSIS</option>
                            @endif 
                            @if (old('group') == '5')
                              <option value="5" selected>DIFFERENTIAL</option>
                            @else
                             <option value="5">DIFFERENTIAL</option>
                            @endif
                           
                            @if (old('group') == ' 6')
                              <option value="6" selected> STOOLANALYSIS</option>
                            @else
                             <option value="6"> STOOLANALYSIS </option>
                            @endif
                             @if (old('group') == '7')
                              <option value="7" selected>CULTURE </option>
                            @else
                             <option value="7">CULTURE </option>
                            @endif
                            @if (old('group') == '8')
                              <option value="8" selected>OTHERS</option>
                            @else
                             <option value="8">OTHERS</option>
                            @endif

                          </select>
                           <br>
                            @error("group")
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                             </div>                                                
                            </div>
                    
                            <div class="col-md-3">
                            <div class="form-group">    
                               <label for="price" class="bmd-label-floating">Price</label>
                               <input name='price'class="form-control" type="text" value="{{old('price')}}">
                                 @error("price")
                                  <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>
                               </div>
                           </div>
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
                          <button type="submit" class="btn btn-rose">save</button>
                          <br>
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
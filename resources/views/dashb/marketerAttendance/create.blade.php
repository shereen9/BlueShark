@extends('layouts.main')
@section('content')


<div class="page-title">
  <div class="title_left">
    <h3>Attendance</h3>
  </div>

</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Attendance Form </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          {{-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a class="dropdown-item" href="#">Settings 1</a>
              </li>
              <li><a class="dropdown-item" href="#">Settings 2</a>
              </li>
            </ul>
          </li> --}}
          {{-- <li><a class="close-link"><i class="fa fa-close"></i></a> --}}
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        {{Form::open(['route' => 'marketerAttendance.store'])}}
             @csrf
             <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Date<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                  {{Form::text('date', $mytime,['class' => 'form-control datepicker','autocomplete'=> 'off']) }}
              </div>
            </div>

             {{-- <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Date<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                  {{Form::text('date', $mytime,['required','class' => 'form-control']) }}
              </div>
            </div> --}}
  
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Over</label>
              <div class="col-md-6 col-sm-6 ">
                {{Form::number('over',old('over'),['class' => 'form-control']) }}
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Penality</label>
              <div class="col-md-6 col-sm-6 ">
                {{Form::number('penality',old('penality'),['class' => 'form-control']) }}
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Attend?<span class="required">*</span>
              </label>
                  <!-- Group of default radios - option 1 -->
                  <div class="custom-control custom-radio" style="margin-top:5px;">
                    {{Form::radio('attend', '1',true) }}
                    <label class="radio-inline" for="defaultGroupExample1">Yes</label>
                  </div>

                  <!-- Group of default radios - option 2 -->
                  <div class="custom-control custom-radio" style="margin-top:5px;">
                    {{Form::radio('attend', '0',false) }}
                    <label class="radio-inline" for="defaultGroupExample2">No</label>
                  </div>
            </div>
          <input type="hidden"  name="id" value="{{$id}}">
          <input type="hidden"  name="branch_id" value="{{$branchid}}">

          <div class="ln_solid"></div>
             <div style="text-align: center">
    
                  {{-- <button class="btn btn-primary" type="button">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button> --}}
                  <a href="{{url()->previous()}}" class="btn btn-danger"> Cancel</a>
               
                  {{-- <button class="btn btn-primary" type="button">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button> --}}
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
          


          
        {{-- </form> --}}
        
      </div>
    </div>
    
  </div>

</div>

<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>

@endsection
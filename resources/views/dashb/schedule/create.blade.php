@extends('layouts.main')
@section('content')

{{-- <div class="col-12">
  @foreach($errors->all() as $err)
  <div class="alert alert-danger mt-4">
    {{$err}}
  </div>
  @endforeach
</div> --}}

<div class="page-title">
  <div class="title_left">
    <h3>Schedules</h3>
  </div>

  {{-- <div class="title_right">
    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div> --}}
</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2> Add Schedule Form </h2>
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

        {{Form::open(['route' => 'schedule.store'])}}
      {{-- <form method="post" action="{{url('/user')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
             @csrf

             <div class="container">
               {{-- <div class="row">
                 <div class="col-md-6"> --}}
          <div class="item form-group row">
            <div class="col-md-6 col-xs-12 ">
            <label class="col-form-label" for="old-name">Choose Branch<span class="required">*</span>
            </label>
            {{Form::select('branch', $branches,'',['required','class' => 'form-control', 'placeholder'=>'Choose Branch']) }}
            </div>
            <div class="col-md-6 col-xs-12 ">

            <label class="col-form-label" for="old-name">Choose Sport<span class="required">*</span>
            </label>
            {{Form::select('sport', $sports,'',['required','class' => 'form-control', 'placeholder'=>'Choose Sport']) }}
            </div>
          </div>

          <div class="item form-group row">
            <div class="col-md-6 col-xs-12 ">
            <label class="col-form-label " for="old-name">Trainer<span class="required">*</span>
            </label>
            {{Form::select('trainer', $trainers,'',['required','class' => 'form-control', 'placeholder'=>'Choose trainer']) }}
            </div>
            <div class="col-md-6 col-xs-12 ">
            <label class="col-form-label" for="old-name">Count<span class="required">*</span>
            </label>
                {{Form::number('count', old('count'),['required','class' => 'form-control']) }}
            </div>
          </div>
    
          <div class="container">
            <div class="row">
                {{-- <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker5'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker5').datetimepicker({
                            defaultDate: "11/1/2013",
                            disabledDates: [
                                moment("12/25/2013"),
                                new Date(2013, 11 - 1, 21),
                                "11/22/2013 00:53"
                            ]
                        });
                    });
                </script>
            </div> --}}
            <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Time From<span class="required">*</span>
              </label>
                  {{Form::text('time_from',old('time_to'),['required','class' => 'form-control']) }}
              </div>
            
            <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Time To<span class="required">*</span>
              </label>
                  {{Form::text('time_to',old('time_to'),['required','class' => 'form-control']) }}
              </div>
        </div>
          </div>
             </div>  
                  

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
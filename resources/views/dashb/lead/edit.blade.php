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
    <h3>Lead</h3>
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
        <h2> Edit Form </h2>
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

        {{Form::open(['route' => ['lead.update', $lead->id]])}}

        {{-- <form method="post" action="{{url('user/'.$user->id)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
            <input type="hidden" name="_method" value="PUT">
             @csrf

             <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label " for="old-name">First Name<span class="required">*</span>
              </label>
                  {{Form::text('firstName',$lead->firstName,['required','class' => 'form-control']) }}
              </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Last Name<span class="required">*</span>
              </label>
                  {{Form::text('lastName',$lead->lastName,['required','class' => 'form-control']) }}
              </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Email<span class="required">*</span>
              </label>
                  {{Form::email('email',$lead->email,['required','class' => 'form-control']) }}
              </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Mobile<span class="required">*</span>
              </label>
                  {{Form::text('mobile',$lead->mobile,['required','class' => 'form-control']) }}
              </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Address<span class="required">*</span>
              </label>
                  {{Form::text('address',$lead->address,['required','class' => 'form-control']) }}
              </div>
              
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">City<span class="required">*</span>
              </label>
                  {{Form::text('city',$lead->city,['required','class' => 'form-control']) }}
              </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Lead Source<span class="required">*</span>
              </label>
                {{Form::select('leadSource',$leadSource,$lead->leadSource,['required','class' => 'form-control' , 'placeholder' => '------'])}}
              </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Status<span class="required">*</span>
              </label>
                {{Form::select('status',$status,$lead->status,['required','class' => 'form-control' , 'placeholder' => '------'])}}
              </div>
            </div>

            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Age<span class="required">*</span>
              </label>
                {{Form::number('age',$lead->age,['required','class' => 'form-control']) }}
              </div>
  
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Gender<span class="required">*</span>
              </label>
                {{Form::select('gender',$gender,$lead->gender,['required','class' => 'form-control' , 'placeholder' => '------'])}}
              </div>
            </div>
  
            <div class="item form-group row">

              <div class="col-md-6 col-xs-12 ">
                <label class="col-form-label" for="old-name">Birth Date<span class="required">*</span>
                </label>
                    {{Form::text('date',$lead->birthdate,['required','class' => 'form-control',  'id' => 'datepicker','autocomplete' => 'off']) }}
                </div>
  
                <div class="col-md-6 col-xs-12 ">
                  <label class="col-form-label" for="old-name"> Sports <span class="required">*</span>
                  </label>
                  <br>
                    @foreach($sports as $sport)
                    {{Form::checkbox('sports[]', $sport->id,(in_array($sport->id,explode(',',$lead->sports)))?"selected":"" )}}
                    <label>{{$sport->name}}</label>
                    <br>
                    @endforeach
                  </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-12 col-xs-12 ">
              <label class="col-form-label" for="old-name">Notes<span class="required">*</span>
              </label>
                  {{Form::textarea('notes',$lead->notes,['required','class' => 'form-control']) }}
              </div>
            </div>

       
            <div class="ln_solid"></div>
            <div style="text-align: center">
   
                 {{-- <button class="btn btn-primary" type="button">Cancel</button>
                 <button class="btn btn-primary" type="reset">Reset</button> --}}
                 <a href="{{url()->previous()}}" class="btn btn-danger"> Cancel</a>
              
                 {{-- <button class="btn btn-primary" type="button">Cancel</button>
                 <button class="btn btn-primary" type="reset">Reset</button> --}}
                 <button type="submit" class="btn btn-success">Update</button>
               </div>

        {{-- </form> --}}
      </div>
    </div>

  </div>
</div>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

@endsection
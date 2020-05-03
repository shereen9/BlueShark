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
    <h3>Marketing Members</h3>
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

        {{Form::open(['route' => ['marketing.update', $marketing->id], 'files' => true])}}

        {{-- <form method="post" action="{{url('user/'.$user->id)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
            <input type="hidden" name="_method" value="PUT">
             @csrf

             <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label " for="old-name">First Name<span class="required">*</span>
              </label>
                  {{Form::text('firstName',$marketing->firstName,['required','class' => 'form-control']) }}
              </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Last Name<span class="required">*</span>
              </label>
                  {{Form::text('lastName',$marketing->lastName,['required','class' => 'form-control']) }}
              </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Email<span class="required">*</span>
              </label>
                  {{Form::email('email',$marketing->email,['required','class' => 'form-control']) }}
              </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Mobile<span class="required">*</span>
              </label>
                  {{Form::text('mobile',$marketing->mobile,['required','class' => 'form-control']) }}
              </div>
            </div>

            <div class="item form-group row">
              <div class="col-md-6 col-sm-12 ">
                <label class="col-form-label" for="old-name"> Password <span class="required">*</span>
                </label>
                  {{-- <input name="password" type="password" id="first-name"  class="form-control"  > --}}
                  {{Form::password('password',['class' => 'form-control']) }}
                </div>
  
                <div class="col-md-6 col-sm-12 ">
                  <label class="col-form-label" for="old-name"> Confirm Password <span class="required">*</span>
                  </label>
                    {{-- <input name="password" type="password" id="first-name"  class="form-control"  > --}}
                    {{Form::password('password_confirmation',['class' => 'form-control']) }}
                  </div>
              </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Address<span class="required">*</span>
              </label>
                  {{Form::text('address',$marketing->address,['required','class' => 'form-control']) }}
              </div>
              
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">City<span class="required">*</span>
              </label>
                  {{Form::text('city',$marketing->city,['required','class' => 'form-control']) }}
              </div>
            </div>

            <div class="item form-group row">

                <div class="col-md-6 col-xs-12 ">
                  <label class="col-form-label" for="old-name">Permission<span class="required">*</span>
                  </label>
                    {{Form::select('permission',$permission,$marketing->permission,['required','class' => 'form-control' , 'placeholder' => '------'])}}
                  </div>

                  <div class="col-md-6 col-xs-12 ">
                    <label class="col-form-label" for="old-name">Branch<span class="required">*</span>
                    </label>
                    <br>
                @foreach($branches as $branch)
                {{Form::checkbox('branches[]', $branch->id , (in_array($branch->id,explode(',',$marketing->branches)))?true:false )}}
                <label>{{$branch->name}}</label>
                <br>
                @endforeach
                    </div>

              {{-- <div class="col-md-6 col-xs-12 ">
                <label class="col-form-label" for="old-name">Branch<span class="required">*</span>
                </label>
                {{Form::select('branch', $branches,$marketing->branch_id,['required','class' => 'form-control', 'placeholder'=>'Choose Branch']) }}
                </div> --}}
            </div>
 
            
            <div class="item form-group row">
            <div class="col-md-12 col-xs-12 ">
              <label class="col-form-label" for="old-name">Image<span class="required">*</span>
              </label>
              {{Form::file('image',['class'=>'form-control' , 'accept' => 'image/*'])}}
              <td>
                @if($marketing->profileImage != null)
                <img src="{{ URL('/') }}/uploads/{{$marketing->profileImage}}" style="max-height:100px"/>
                @else
                      No image
              </td>
              @endif
              </div>
            </div>

            <div class="item form-group row">
              <div class="col-md-12 col-xs-12 ">
              <label class="col-form-label" for="old-name">Notes<span class="required">*</span>
              </label>
                  {{Form::textarea('notes',$marketing->notes,['required','class' => 'form-control']) }}
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
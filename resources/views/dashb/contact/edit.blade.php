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
    <h3>Contact</h3>
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

        {{Form::open(['route' => ['contact.update', $contact->id], 'files'=>true])}}

        {{-- <form method="post" action="{{url('user/'.$user->id)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
            <input type="hidden" name="_method" value="PUT">
             @csrf

             <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label " for="old-name">First Name<span class="required">*</span>
              </label>
                  {{Form::text('firstName',$contact->firstName,['required','class' => 'form-control']) }}
              </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Last Name<span class="required">*</span>
              </label>
                  {{Form::text('lastName',$contact->lastName,['required','class' => 'form-control']) }}
              </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Email<span class="required">*</span>
              </label>
                  {{Form::email('email',$contact->email,['required','class' => 'form-control']) }}
              </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Mobile<span class="required">*</span>
              </label>
                  {{Form::text('mobile',$contact->mobile,['required','class' => 'form-control']) }}
              </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Address<span class="required">*</span>
              </label>
                  {{Form::text('address',$contact->address,['required','class' => 'form-control']) }}
              </div>
              
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">City<span class="required">*</span>
              </label>
                  {{Form::text('city',$contact->city,['required','class' => 'form-control']) }}
              </div>
            </div>

            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Age<span class="required">*</span>
              </label>
                {{Form::number('age',$contact->age,['required','class' => 'form-control']) }}
              </div>
  
              <div class="col-md-6 col-xs-12 ">
                <label class="col-form-label" for="old-name">Birth Date<span class="required">*</span>
                </label>
                    {{Form::text('date',$contact->birthdate,['required','class' => 'form-control datepicker','autocomplete' => 'off']) }}
                </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Lead Source<span class="required">*</span>
              </label>
                {{Form::select('leadSource',$leadSource,$contact->leadSource,['required','class' => 'form-control' , 'placeholder' => '------'])}}
              </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Status<span class="required">*</span>
              </label>
                {{Form::select('status',$status,$contact->status,['required','class' => 'form-control' , 'placeholder' => '------'])}}
              </div>
            </div>
  
            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
                <label class="col-form-label" for="old-name">Fees<span class="required">*</span>
                </label>
                    {{Form::text('fees',$contact->fees,['required','class' => 'form-control']) }}
                </div>

                <div class="col-md-6 col-xs-12 ">
                  <label class="col-form-label" for="old-name">Subscription Date<span class="required">*</span>
                  </label>
                      {{Form::text('subscriptionDate',$contact->subscriptionDate,['required','class' => 'form-control datepicker','autocomplete' => 'off']) }}
                  </div>

            </div>

            <div class="item form-group row">

              <div class="col-md-6 col-xs-12 ">
                <label class="col-form-label" for="old-name">Rate<span class="required">*</span>
                </label>
                    {{Form::text('rate',$contact->rate,['required','class' => 'form-control']) }}
                </div>
              <div class="col-md-6 col-xs-12 ">
                <label class="col-form-label" for="old-name">Group<span class="required">*</span>
                </label>
                {{Form::select('group', $groups,$contact->group_id,['required','class' => 'form-control', 'placeholder'=>'Choose group']) }}
              </div>
            </div>

            <div class="item form-group row">

              <div class="col-md-6 col-xs-12 ">
                <label class="col-form-label" for="old-name">Gender<span class="required">*</span>
                </label>
                  {{Form::select('gender',$gender,$contact->gender,['required','class' => 'form-control' , 'placeholder' => '------'])}}
                </div>

              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Image<span class="required">*</span>
              </label>
              {{Form::file('image',['class'=>'form-control' , 'accept' => 'image/*'])}}
              <td> 
                @if($contact->profileImage != null)
                <img src="{{ URL('/') }}/uploads/{{$contact->profileImage}}" style="max-height:100px"/>
              <@else
                No image
          </td>
          @endif
              </div>
            </div>

            <div class="item form-group row">
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Level<span class="required">*</span>
              </label>
                  {{Form::text('level',$contact->level,['required','class' => 'form-control']) }}
              </div>
  
              <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Union<span class="required">*</span>
              </label>
                  {{Form::text('unions',$contact->unions,['required','class' => 'form-control']) }}
              </div>
            </div>
            <div class="item form-group row">

              {{-- <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name">Branch<span class="required">*</span>
              </label>
              {{Form::select('branch', $branches,$contact->branch_id,['required','class' => 'form-control', 'placeholder'=>'Choose Branch']) }}
              </div> --}}
              <div class="col-md-6 col-xs-12 ">
                <label class="col-form-label" for="old-name">Branch<span class="required">*</span>
                </label>
                {{Form::select('branch', $branches,'',['class' => 'form-control', 'placeholder'=>'Choose Branch']) }}
                <br>
            @foreach($branches as $branch)
            {{Form::checkbox('branches[]', $branch->id , (in_array($branch->id,explode(',',$contact->branches)))?true:false )}}
            <label>{{$branch->name}}</label>
            <br>
            @endforeach
                </div>
            <div class="col-md-6 col-xs-12 ">
              <label class="col-form-label" for="old-name"> Sports <span class="required">*</span>
              </label>
              <br>
                @foreach($sports as $sport)
                {{Form::checkbox('sports[]', $sport->id,(in_array($sport->id,explode(',',$contact->sports)))?"selected":"" )}}
                <label>{{$sport->name}}</label>
                <br>
                @endforeach
              </div>
            </div>
            <div class="item form-group row">
              <div class="col-md-12 col-xs-12 ">
              <label class="col-form-label" for="old-name">Notes<span class="required">*</span>
              </label>
                  {{Form::textarea('notes',$contact->notes,['required','class' => 'form-control']) }}
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
    $( ".datepicker" ).datepicker();
  } );
  </script>
@endsection
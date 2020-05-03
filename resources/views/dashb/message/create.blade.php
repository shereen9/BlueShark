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
    <h3>Message</h3>
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
        <h2>Add Message</h2>
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

        {{Form::open(['route' => 'message.store', 'files' => true])}}
      {{-- <form method="post" action="{{url('/user')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
             @csrf

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name"> To <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              {{Form::select('to',$users,'',['class' => 'form-control' , 'placeholder' => '------'])}}
              {{-- <input name="name" type="text" id="first-name" required="required" class="form-control"  > --}}
            </div>
          </div> 

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name"> Message <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                {{Form::textarea('message', '',['class' => 'form-control']) }}
              {{-- <input name="name" type="text" id="first-name" required="required" class="form-control"  > --}}
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label  col-md-3 col-sm-3 label-align" for="old-name"> Image <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                  {{Form::file('image',['class' => 'form-control', 'accept' => 'image/*']) }}
            </div>
          </div>
          <div class="ln_solid"></div>
          <div style="text-align: center">
 
               {{-- <button class="btn btn-primary" type="button">Cancel</button>
               <button class="btn btn-primary" type="reset">Reset</button> --}}
               <a href="{{url()->previous()}}" class="btn btn-danger"> Cancel</a>
            
               {{-- <button class="btn btn-primary" type="button">Cancel</button>
               <button class="btn btn-primary" type="reset">Reset</button> --}}
               <button type="submit" class="btn btn-success">Send</button>
             </div>
       
          
        {{-- </form> --}}
        
      </div>
    </div>
  </div>

</div>


@endsection
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
    <h3>Expense</h3>
  </div>
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

        {{Form::open(['route' => ['expense.update', $expense->id], 'files'=>true])}}

        {{-- <form method="post" action="{{url('user/'.$user->id)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
            <input type="hidden" name="_method" value="PUT">
             @csrf

             <div class="item form-group ">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Statement<span class="required">*</span></label>
              <div class="col-md-6 col-xs-12 ">
              </label>
                  {{Form::text('statement',$expense->statement,['required','class' => 'form-control']) }}
              </div>
            </div>
  
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Amount<span class="required">*</span></label>
              <div class="col-md-6 col-xs-12 ">
                    {{Form::text('amount',$expense->amount,['required','class' => 'form-control']) }}
                </div>
              </div>
  
              <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Date<span class="required">*</span></label>
                <div class="col-md-6 col-xs-12 ">
                  </label>
                      {{Form::text('date',$expense->amount,['required','class' => 'form-control datepicker','autocomplete' => 'off']) }}
                </div>
              </div>

              <div class="item form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Notes</label>
                <div class="col-md-6 col-xs-12 ">
                    {{Form::textarea('notes',$expense->notes,['required','class' => 'form-control', 'rows'=>'3']) }}
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
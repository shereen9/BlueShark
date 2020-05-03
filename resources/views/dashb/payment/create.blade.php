@extends('layouts.main')
@section('content')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script> --}}

<script LANGUAGE="JavaScript">
  function getfees(){
    var contact = $('.contact').val();
    var month = $('.month').val();

    if(contact == "" || month =="") {$('.paid').css('display','none');}
    if(contact != "" && month !=""){
      $.post("{{URL('/')}}/getFees",
        {'_token': $("meta[name=csrf-token]").attr('content'),'id': contact,'month':month},
        //return function which return data from controller
        function(data){
         $('.fees').val(data);
         $('.paid').css('display','block');
        });
  }
}

function getrest(){
  var fees = $('.fees').val();
  var paid = $('.paid').val();
  var rest = fees-paid;
  $('.rest').val(rest);
}
</script>

{{-- <script type="text/javascript">

$(document).ready(function(){

  $(document).on('change', '.contacts', function(){
  console.log("yes changed");
  var cont_id = $(this).val();
  console.log(cont_id);
  $.ajax({
    type: 'get' ,
    url:'{{URL('/')}}/getFees',
    data:{'id':cont_id},
    success:function(data){
  console.log('success');
  console.log(data);

    },
    error:function(){}
  });

  });

});

</script> --}}


<div class="page-title">
  <div class="title_left">
    <h3>Receipt</h3>
  </div>

</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add Receipt</h2>
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

        {{Form::open(['route' => 'payment.store', 'files' => true])}}
      {{-- <form method="post" action="{{url('/user')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
             @csrf

             <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Receipt Number<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                {{Form::text('receipt', old('receipt'),['required','class' => 'form-control']) }}
                {{-- <input name="name" type="text" id="first-name" required="required" class="form-control"  > --}}
              </div>
            </div> 

          <div class="item form-group">
            <label class=" col-form-label col-md-3 col-sm-3 label-align" for="old-name"> Contact <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              {{Form::select('Contact',$contacts,old('Contact'),['class' => 'form-control contact' , 'placeholder' => '------', 'onchange'=>"getfees()"])}}
              {{-- <input name="name" type="text" id="first-name" required="required" class="form-control"  > --}}
            </div>
          </div> 

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name"> Month <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                {{Form::select('month',$months,'',['class' => 'form-control month','placeholder' => '------', 'onchange'=>"getfees()"]) }}
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Required Fees<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6">
              {{Form::number('fees', old('fees'),['required','class' => 'form-control fees', 'disabled']) }}
              {{-- <label class="fees"></label> --}}
              {{-- <input name="name" type="text" id="first-name" required="required" class="form-control"  > --}}
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Paid<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              {{Form::text('paid', old('paid'),['required','class' => 'form-control paid','style'=>'display:none','onkeyup'=>'getrest()']) }}
              {{-- <input name="name" type="text" id="first-name" required="required" class="form-control"  > --}}
            </div>
          </div>

          
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Rest<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              {{Form::number('rest', old('rest'),['required','class' => 'form-control rest','readonly']) }}
              {{-- <input name="name" type="text" id="first-name" required="required" class="form-control"  > --}}
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
  <div class="col-12">
      @foreach($errors->all() as $err)
      <div class="alert alert-danger mt-4">
        {{$err}}
      </div>
      @endforeach
 </div>
</div>


@endsection
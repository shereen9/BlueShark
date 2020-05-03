@extends('layouts.main')
@section('content')


<script LANGUAGE="JavaScript">

  function getsports(id){
    // alert(id);
    $.post("{{URL('/')}}/getsports",
    {'_token': $("meta[name=csrf-token]").attr('content'),
        'id': id},
        function(data){
          $('.sport').empty().append(data);
        });
  }

  function getcontacts(id,branch_id){
    // alert(id);
    $.post("{{URL('/')}}/getcontacts",
    {'_token': $("meta[name=csrf-token]").attr('content'),
        'id': id,'branch_id':branch_id},
        function(data){
          $('.contact').empty().append(data);
        });
  }
</script>

<div class="page-title">
    <div class="title_left">
      <h3>Contacts Attendance</h3>
    </div>
  </div>


<div class="x_panel">
    <div class="x_title">
      <h2>Contacts Attendance</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        {{-- <a href="{{route('trainer.create')}}"><i class="fa fa-plus"></i> New</a> --}}
        </li>
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        {{-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
        </li> --}}
       
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      {{-- {{Form::open(['route' => 'cAttendance.store'])}} --}}

      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Branches<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          {{Form::select('branch',$branches,'',['class' => 'form-control ' , 'placeholder' => '------', 'onchange'=>"getsports(this.value)"])}}
          {{-- <input name="name" type="text" id="first-name" required="required" class="form-control"  > --}}
        </div>
      </div>

<div class="sport"></div><br><br>
<div class="contact" >
 
</div>

      {{-- <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody> --}}
{{--              
        @foreach ($trainers as $i=>$trainer)
        <tr>
        <td>{{++$i}}</td>
        <td> <a  href="{{route('tAttendance.show',['tAttendance'=>$trainer->id])}}" >{{$trainer->firstName}} {{$trainer->lastName}}</td>
        <td>{{$trainer->mobile}}</td>
        <td>{{$trainer->email}}</td>

        <td class=" last">
        <button class="button2" type="submit"><a href="{{ url('/trainerAttendance/createA/'.$trainer->id) }}"><i class="far fa-arrow-alt-circle-right"></i></a></td></button> --}}
        {{-- @foreach ($attendances as $i=>$attendance)
        @if($attendance->status == 0)
        <i class="fa fa-check" aria-hidden="true"></i>
        @endif   --}}
        </td>
        {{-- <td></td>
        <td></td> --}}
        {{-- </tr>
        @endforeach --}}
        {{-- </tbody>
      </table> --}}

    </div>
  </div>
</div>




@endsection
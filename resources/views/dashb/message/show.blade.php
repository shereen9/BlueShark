@extends('layouts.main')
@section('content')

{{-- <div class="x_panel">
    <div class="x_title">
      
    
     
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="container">
        
           {{$message->message}}
           <br>

          @if($message->image != null)
          
           <br>
          <img src="{{ URL('/') }}/uploads/{{$message->image}}" style="max-height:50px"/>
          @endif
        
        
      </div>
    </div>
  </div>
</div> --}}


<div class="page-title">
  <div class="title_left">
    <h4><?php  $user = \App\User::where('id', $message->from)->first()  ?> {{  ucfirst($user->firstName) }} </h4>
  </div>
</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
    <small>{{$message->created_at}}</small>
      
        <ul class="nav navbar-right panel_toolbox">
          {{-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li> --}}
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
           
          @foreach ($msgs as $msg)
@php
    $style = ($msg->from == Auth::id())?'direction:rtl;text-align:right':'';
@endphp

      <div style="{{$style}}">
          <div class="item form-group">
            <h4  for="old-name" style="border:1px solid #c1c1c1; padding:10px 15px;background: #f1f1f1;border-radius:15px">{{$msg->message}}</h4>
          </div>

          <div class="item form-group">
            {{-- <label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name"> --}}
               @if($msg->image != null)
              <img src="{{ URL('/') }}/uploads/{{$msg->image}}" style="max-height:50px"/>
              @endif
            {{-- </label> --}}
          </div>
      </div>
          @endforeach
          <div class="item form-group row">
            <div class="col-md-12 col-xs-12 ">
              {{Form::open(['route' => 'message.store', 'files' => true])}}
              @csrf
            <label class="col-form-label" for="old-name">Reply </label>
                {{Form::textarea('message', '',['required','class' => 'form-control','rows'=>'3']) }}
            </div>
            <div class="col-md-12 col-xs-12 ">
            {{Form::file('image',[ 'accept' => 'image/*']) }}
            </div>
          </div>
        </div>
      <input type="hidden" name="to" value="{{$user->id}}">

        <div class="button-box col-lg-7">
          <div class="col-md-3 col-sm-6 offset-md-6 ">
          {{-- <button class="btn btn-primary" type="button">Cancel</button>
          <button class="btn btn-primary" type="reset">Reset</button> --}}
          <button type="submit" class="btn btn-success">Send</button>
        </div>
        </div>
        {!!Form::close()!!}
        {{-- </form> --}}
        
      </div>
    </div>
  </div>

</div>



@endsection
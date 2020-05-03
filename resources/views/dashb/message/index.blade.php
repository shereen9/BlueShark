@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>All Messages</h3>
    </div>

    {{-- <div class="title_right">
      <div class="col-md-5 col-sm-5   form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div> --}}
  </div>


<div class="x_panel">
    <div class="x_title">
      <h2>Inbox</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>From</th>
            <th>Message</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $i=>$message)
          <tr style="cursor:pointer" onclick="window.location ='{{url('message/'.$message['id'])}}'">
       

          <td>{{++$i}}</td>
          <td>
          <?php  $user = \App\User::where('id', $message->from)->first()  ?>
          {{ ucfirst($user->firstName) }} {{ ucfirst($user->lastName) }}
          </td>
          <td>{{ substr($message->message,0,100) }}....</td>
          {{-- @if($message->image != null)
          <td><img src="{{ URL('/') }}/uploads/{{$message->image}}" style="max-height:50px"/></td>
          @endif  --}}
          {{-- <td>{{$message->status}}</td> --}}
         
          {{-- <td class=" last">
            <a href="{{route('group.edit',['group'=>$group->id])}}"><i class="far fa-edit"></i></a> --}}
          
            {{-- <td class=" last">
                    <form method="POST" action="{{route('group.destroy',['group'=>$group->id])}}">
                            @method('delete')
                            @csrf
                            <button class="button2" type="submit"><i class="fas fa-trash"></i></button>
                              </form>
                          </td>
          </td> --}}
                          <td></td>
                          <td></td>
      
      </tr>
          @endforeach
         
        </tbody>
      </table>

    </div>
  </div>

  <div class="page-title">
    <div class="title_left">
      <h3>Your Sent Messages</h3>
    </div>

  </div>

  <div class="x_panel">
    <div class="x_title">
      <h2>Sent</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('message.create')}}"><i class="fa fa-plus"></i>New Message</a>
        </li>   
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>to</th>
            <th>Message</th>
            {{-- <th>Status</th> --}}
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($msgs as $i=>$msg)
          <tr style="cursor:pointer,{{ ($msg->status=="unread")?"background:#eee":''}}" onclick="window.location ='{{url('message/'.$msg['id'])}}'">
          <td>{{++$i}}</td>
          <td>
          <?php  $user = \App\User::where('id', $msg->to)->first()  ?>
          {{ ucfirst($user->firstName) }}
          {{ ucfirst($user->lastName) }}
          </td>
          {{-- <td>{{$message->message}}</td> --}}
         <td>{{ substr($msg->message, 0,100) }}....</td>
          {{-- <td>{{$msg->status}}</td> --}}
          {{-- @if($message->image != null)
          <td><img src="{{ URL('/') }}/uploads/{{$message->image}}" style="max-height:50px"/></td>
          @endif  --}}
          {{-- <td>{{$message->status}}</td> --}}

                          <td></td>
                          <td></td>
          </tr>
          @endforeach
         
        </tbody>
      </table>

    </div>
  </div>

</div>




@endsection
@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <a href="{{url()->previous()}}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Back</a>
    </div>

  </div>


<div class="x_panel">
    <div class="x_title">
    
       <h2>{{$contact->firstName}}'s Attendances</h2> 
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

      <table class="table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Sport</th>
            <th>Attended?</th>
            <th></th>
            {{-- <th></th> --}}
            {{-- <th></th> --}}
            <th></th>
          </tr>
        </thead>
        <tbody>
             
       
        <tr>
        @foreach ($cAttends as $i=>$cAttend)
 
        <td>{{$cAttend->date}}</td>
        <td>{{$cAttend->time}}</td>
        <td>{{$cAttend->sport->name}}</td>
        @if($cAttend->status == 0)
           <?php $status =" No"; ?>
        @else  
            <?php $status =" Yes"; ?>
            @endif
        <td>{{$status}}</td>

        <td class=" last">
            <a class="edit" href="{{route('cAttendance.edit',['cAttendance'=>$cAttend->id])}}"><span class="glyphicon glyphicon-edit"></a>
        </td>
        <td class=" last">
          <form method="POST" action="{{route('cAttendance.destroy',['cAttendance'=>$cAttend->id])}}">
                  @method('delete')
                  @csrf
                  <button class="delete" onclick="return confirm('Are you sure you want to delete it')" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                    </form>
                </td>
        {{-- <td></td>
        <td></td> --}}
        </tr>
      @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>




@endsection
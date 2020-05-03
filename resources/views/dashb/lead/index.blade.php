@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>Leads</h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5   form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>


<div class="x_panel">
    <div class="x_title">
      <h2>Leads Table</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('lead.create')}}"><i class="fa fa-plus"></i> New</a>
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
      <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            {{-- <th>Last Name</th> --}}
            <th>Mobile</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            {{-- <th>Birth Date</th> --}}
            <th>Address</th>
            <th>City</th>
            {{-- <th>Lead Source</th> --}}
            {{-- <th>Status</th> --}}
            <th>Sports</th>
            {{-- <th>notes</th> --}}
            <th>By</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
             
         @foreach ($leads as $i=>$lead)
          <tr>
          <td>{{++$i}}</td>
          <td>{{$lead->firstName}} {{$lead->lastName}}</td>
          {{-- <td>{{$lead->lastName}}</td> --}}
          <td>{{$lead->mobile}}</td>
          <td>{{$lead->email}}</td>
          <td>{{$lead->age}}</td>
          <td>{{$lead->gender}}</td>
          {{-- <td>{{date('d-m-Y', strtotime($lead->birthdate))}}</td> --}}
          <td>{{$lead->address}}</td>
          <td>{{$lead->city}}</td>
          {{-- <td>{{$lead->leadSource}}</td> --}}
          {{-- <td>{{$lead->status}}</td> --}}
          
          <td>
                <?php $sports = explode(',',$lead->sports); ?>
            @foreach ($sports as $sport)
                <?php $sportData = \App\sport::find($sport);?>
                {{ $sportData->name }}<br>
            @endforeach
          </td>
          {{-- <td>{{$lead->notes}}</td> --}}
          <td>{{$lead->user->firstName}}</td>
          <td class=" last">
            <a class="edit" href="{{route('lead.edit',['lead'=>$lead->id])}}"><span class="glyphicon glyphicon-edit"></a></td>
          {{-- <td class=" last"><a href="{{route('category.destroy',['category'=>$category->id])}}">Delete</a> --}}
            <td class=" last">
            <form method="POST" action="{{route('lead.destroy',['lead'=>$lead->id])}}">
                @method('delete')
                @csrf
                <button class="delete" onclick="return confirm('Are you sure you want to delete it')" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
            </form>
            </td>
            <td class=" last">
              {{-- <a href="{{route('lead.transmit',['lead'=>$lead->id])}}"><i class="far fa-arrow-alt-circle-right"></i></a></td> --}}
              <button class="button2" onclick="return confirm('Are you sure you want to transmit this lead to contacts?')" type="submit"><a href="{{url('/transmit/'.$lead->id)}}"><i class="far fa-arrow-alt-circle-right"></i></a></td></button>

                       
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>




@endsection
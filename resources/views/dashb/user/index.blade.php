@extends('layouts.main')
@section('content')



<div class="page-title">
    <div class="title_left">
      <h3>Users</h3>
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
  <h2>Users Table</h2>
  <ul class="nav navbar-right panel_toolbox">
    <li>
    <a href="{{route('user.create')}}"><i class="fa fa-plus"></i> New</a>
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
        <th>#</th>
        <th>Name</th>
        {{-- <th>Last Name</th> --}}
        <th>Email</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>City</th>
        <th>Profession</th>
        <th>permission</th>
        <th>Branch</th>
        {{-- <th>notes</th> --}}
        <th>Image</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
          
      @foreach ($users as $i=>$user)
      <tr>
      <td>{{++$i}}</td>
      <td>{{$user->firstName}} {{$user->lastName}}</td>
      {{-- <td>{{$user->lastName}}</td> --}}
      <td>{{$user->email}}</td>
      <td>{{$user->address}}</td>
      <td>{{$user->mobile}}</td>
      <td>{{$user->city}}</td>
      <td>{{$user->profession}}</td>
      <td>{{$user->permission}}</td>
      <td>
      @if ($user->branches !="")
        <?php $branches = explode(',',$user->branches); ?>
        @foreach ($branches as $branch)
            <?php $branchData = \App\branch::find($branch);?>
            {{ $branchData->name }}<br>
        @endforeach
    @endif

  </td>

      {{-- <td>{{$user->notes}}</td> --}}
      <td>
      @if($user->profileImage != null)
      <img src="{{ URL('/') }}/uploads/{{$user->profileImage}}" style="max-height:50px"/>
      @else
      No image
    </td>
      @endif
      <td class=" last"><a class="edit" href="{{route('user.edit',['user'=>$user->id])}}"><span class="glyphicon glyphicon-edit"></a>
        
      {{-- <td class=" last"><a href="{{route('user.destroy',['user'=>$user->id])}}">Delete</a> --}}
      <td class=" last">
      <form method="POST" action="{{route('user.destroy',['user'=>$user->id])}}">
        @method('delete')
        @csrf
        <button class="delete" onclick="return confirm('Are you sure you want to delete it')" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
          </form>
      </td>
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
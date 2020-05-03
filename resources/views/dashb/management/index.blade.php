@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>Management Members</h3>
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
      <h2>Management Members Table</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('management.create')}}"><i class="fa fa-plus"></i> New</a>
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
            <th>First Name</th>
            <th>Last Name</th>
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
          @foreach ($members as $i=>$member)
          <tr>
          <td>{{++$i}}</td>
          <td>{{$member->firstName}}</td>
          <td>{{$member->lastName}}</td>
          <td>{{$member->email}}</td>
          <td>{{$member->address}}</td>
          <td>{{$member->mobile}}</td>
          <td>{{$member->city}}</td>
          <td>{{$member->profession}}</td>
          <td>{{$member->permission}}</td>
          <td>
            <?php $branches = explode(',',$member->branches); ?>
        @foreach ($branches as $branch)
            <?php $branchData = \App\branch::find($branch);?>
            {{ $branchData->name }}<br>
        @endforeach
      </td>
          {{-- <td>{{$member->branch->name}}</td> --}}
      {{-- <td>{{$member->notes}}</td> --}}
      <td>
        @if($member->profileImage != null)
        <img src="{{ URL('/') }}/uploads/{{$member->profileImage}}" style="max-height:50px"/>
        @else
            No image
      </td>
      @endif
      
          <td class=" last">
            <a class="edit" href="{{route('management.edit',['management'=>$member->id])}}"><span class="glyphicon glyphicon-edit"></a>
          {{-- <td class=" last"><a href="{{route('category.destroy',['category'=>$category->id])}}">Delete</a> --}}
            <td class=" last">
                    <form method="POST" action="{{route('management.destroy',['management'=>$member->id])}}">
                            @method('delete')
                            @csrf
                            <button class="delete" onclick="return confirm('Are you sure you want to delete it')" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                              </form>
                          </td>
                        
          </tr>
          @endforeach     
         
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>




@endsection
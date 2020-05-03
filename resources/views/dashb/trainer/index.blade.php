@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>Trainers</h3>
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
      <h2>Trainers Table</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('trainer.create')}}"><i class="fa fa-plus"></i> New</a>
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
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Sports</th>
            <th>notes</th>
            <th>Salary Per Hour</th>
            <th>Salary Per Month</th>
            <th>Branch</th>
            <th>Image</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
             
         @foreach ($trainers as $i=>$trainer)
          <tr>
          <td>{{++$i}}</td>
          <td>{{$trainer->firstName}} {{$trainer->lastName}}</td>
          {{-- <td>{{$trainer->lastName}}</td> --}}
          <td>{{$trainer->mobile}}</td>
          <td>{{$trainer->email}}</td>
          <td>{{$trainer->address}}</td>
          <td>{{$trainer->city}}</td>
          
          <td>
                <?php $sports = explode(',',$trainer->sports); ?>
            @foreach ($sports as $sport)
                <?php $sportData = \App\sport::find($sport);?>
                {{ $sportData->name }}<br>
            @endforeach
          </td>
          <td>{{$trainer->notes}}</td>
          <td>{{$trainer->salary_per_hour}}</td>
          <td>{{$trainer->salary_per_month}}</td>
          <td>
            <?php $branches = explode(',',$trainer->branches); ?>
        @foreach ($branches as $branch)
            <?php $branchData = \App\branch::find($branch);?>
            {{ $branchData->name }}<br>
        @endforeach
      </td>
          <td>
            @if($trainer->profileImage != null)
            <img src="{{ URL('/') }}/uploads/{{$trainer->profileImage}}" style="max-height:50px"/>
            @else
            No image
      </td>
      @endif
          <td class=" last">
            <a class="edit" href="{{route('trainer.edit',['trainer'=>$trainer->id])}}"><span class="glyphicon glyphicon-edit"></a>
          {{-- <td class=" last"><a href="{{route('category.destroy',['category'=>$category->id])}}">Delete</a> --}}
            <td class=" last">
                    <form method="POST" action="{{route('trainer.destroy',['trainer'=>$trainer->id])}}">
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
@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>Categories</h3>
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
      <h2>Sports Table</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('sport.create')}}"><i class="fa fa-plus"></i> New</a>
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
            <th> Name</th>
            <th>Gender</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
             
         @foreach ($sports as $i=>$sport)
          <tr>
          <td>{{++$i}}</td>
          <td>{{$sport->name}}</td>
          <td>{{$sport->gender}}</td>
          <td class=" last">
            <a class="edit" href="{{route('sport.edit',['sport'=>$sport->id])}}"><span class="glyphicon glyphicon-edit"></span></i></a>
          {{-- <td class=" last"><a href="{{route('category.destroy',['category'=>$category->id])}}">Delete</a> --}}
            <td class=" last">
                    <form method="POST" action="{{route('sport.destroy',['sport'=>$sport->id])}}">
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
</div>

@endsection

{{-- <a class="pull-left space" href="{{ URL('hotel/' .  $h->id  . '/edit') }}">
  <span class="glyphicon glyphicon-edit"></span> </a>
  {{ Form::open(array('url' => 'hotel/' . $h->id, 'class' => 'pull-left')) }}
  {{ Form::hidden('_method', 'DELETE') }}
  <button type="submit" class="delete" onclick="return confirm('Do you want to delete this item?');"><span class="glyphicon glyphicon-remove"></span> </button>
  {{ Form::close() }} --}}
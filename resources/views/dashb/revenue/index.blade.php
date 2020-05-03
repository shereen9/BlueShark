@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>Revenues</h3>
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
      <h2>Revenues Table</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('revenue.create')}}"><i class="fa fa-plus"></i> New</a>
        </li>
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
       
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Statement</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Added By</th>
            <th>Notes</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($revenues as $i=>$revenue)
          <tr>
          <td>{{++$i}}</td>
          <td>{{$revenue->statement}}</td>
          <td>{{$revenue->amount}}</td>
          <td>{{$revenue->date}}</td>
          <td>{{$revenue->user->firstName}}</td>
          <td>{{$revenue->notes}}</td>
          
          <td class=" last">
            <a class="edit" href="{{route('revenue.edit',['revenue'=>$revenue->id])}}"><span class="glyphicon glyphicon-edit"></a>
          
            <td class=" last">
                    <form method="POST" action="{{route('revenue.destroy',['revenue'=>$revenue->id])}}">
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
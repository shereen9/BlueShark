@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>Expenses</h3>
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
      <h2>Expenses Table</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('expense.create')}}"><i class="fa fa-plus"></i> New</a>
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
          @foreach ($expenses as $i=>$expense)
          <tr>
          <td>{{++$i}}</td>
          <td>{{$expense->statement}}</td>
          <td>{{$expense->amount}}</td>
          <td>{{$expense->date}}</td>
          <td>{{$expense->user->firstName}}</td>
          <td>{{$expense->notes}}</td>
          
          <td class=" last">
            <a class="edit" href="{{route('expense.edit',['expense'=>$expense->id])}}"><span class="glyphicon glyphicon-edit"></a>
          
            <td class=" last">
                    <form method="POST" action="{{route('expense.destroy',['expense'=>$expense->id])}}">
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
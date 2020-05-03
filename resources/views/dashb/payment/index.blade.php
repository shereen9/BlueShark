@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>Payments</h3>
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
      <h2>Payments Table</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('payment.create')}}"><i class="fa fa-plus"></i> New</a>
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
            <th>Receipt Number</th>
            <th>Contact</th>
            <th>Paid</th>
            <th>Rest</th>
            <th>Month</th>
            <th>Added By</th>
            <th></th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($receipts as $i=>$receipt)
          <tr>
          <td>{{++$i}}</td>
          <td>{{$receipt->receipt_no}}</td>
          <td>{{$receipt->contact->firstName}}</td>
          <td>{{$receipt->fees}}</td>
          <td>{{$receipt->rest}}</td>
          <td>
            @php
                $arr1 =['1','2','3'];
                $arr2 =['Jan','Feb','March'];
                echo str_replace($arr1,$arr2,$receipt->month);
            @endphp
          </td>
          <td>{{$receipt->user->firstName}}</td>
          {{-- <td class=" last">
            <a href="{{route('payment.edit',['payment'=>$receipt->id])}}"><i class="far fa-edit"></i></a></td> --}}
          {{-- <td class=" last"><a href="{{route('category.destroy',['category'=>$category->id])}}">Delete</a> --}}
            <td class=" last">
                    <form method="POST" action="{{route('payment.destroy',['payment'=>$receipt->id])}}">
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
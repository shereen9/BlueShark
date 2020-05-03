@extends('layouts.main')
@section('content')


<div class="page-title">
    <div class="title_left">
      <h3>Contacts</h3>
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
      <h2>Contacts Table</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
        <a href="{{route('contact.create')}}"><i class="fa fa-plus"></i> New</a>
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
            <th>Mobile</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            {{-- <th>Birth Date</th> --}}
            {{-- <th>Address</th> --}}
            {{-- <th>City</th> --}}
            {{-- <th>Lead Source</th> --}}
            <th>Status</th>
            <th>Sports</th>
            <th>Fees</th>
            {{-- <th>notes</th> --}}
            <th>Image</th>
            <th>Subscription</th>
            <th>By</th>
            <th>Branch</th>
            <th>Group</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $i=>$contact)
          <tr>
          <td>{{++$i}}</td>
          <td>{{$contact->firstName}} {{$contact->lastName}}</td>
          <td>{{$contact->mobile}}</td>
          <td>{{$contact->email}}</td>
          <td>{{$contact->age}}</td>
          <td>{{$contact->gender}}</td>
          {{-- <td>{{$contact->birthdate}}</td> --}}
          {{-- <td>{{$contact->address}}</td> --}}
          {{-- <td>{{$contact->city}}</td> --}}
          {{-- <td>{{$contact->leadSource}}</td> --}}
          <td>{{$contact->status}}</td>
          
          <td>
                <?php $sports = explode(',',$contact->sports); ?>
            @foreach ($sports as $sport)
                <?php $sportData = \App\sport::find($sport);?>
                {{ $sportData->name }}<br>
            @endforeach
          </td>
          <td>{{$contact->fees}}</td>
          {{-- <td>{{$contact->notes}}</td> --}}
          <td>
            @if($contact->profileImage != null)
            <img src="{{ URL('/') }}/uploads/{{$contact->profileImage}}" style="max-height:50px"/>
            @else
                No image
          </td>
          @endif
          <td>{{$contact->subscriptionDate}}</td>
          <td>{{$contact->user->name}}</td>
          {{-- <td>{{($contact->branch_id !="")?$contact->branch->name:""}}</td> --}}
        {{-- <td>{{$contact->branch->name}}</td> --}}
        <td>
          <?php $branches = explode(',',$contact->branches); ?>
      @foreach ($branches as $branch)
          <?php $branchData = \App\branch::find($branch);?>
          {{ $branchData->name }}<br>
      @endforeach
    </td>
          <td>{{($contact->group_id !="")?$contact->group->name:""}}</td>
          <td class=" last">
            <a class="edit" href="{{route('contact.edit',['contact'=>$contact->id])}}"><span class="glyphicon glyphicon-edit"></a>
          {{-- <td class=" last"><a href="{{route('category.destroy',['category'=>$category->id])}}">Delete</a> --}}
            <td class=" last">
                    <form method="POST" action="{{route('contact.destroy',['contact'=>$contact->id])}}">
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
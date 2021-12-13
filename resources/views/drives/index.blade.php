@extends('layouts.app')
@section('content')
<h1 class="text-center text-info"> Drive List</h1>
@if (Session::has('done'))
   <div class="alert alert-success w-50 mx-auto">
    {{Session::get('done')}}
   </div>

@endif
<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
          <table class="table table-dark">
              <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th colspan="3">Action</th>
              </tr>
              @foreach ($drives as $data)


              <tr>
                  <th>{{$data->id}}</th>
                  <th>{{$data->title}}</th>
                  <th><a href="{{route("drives.show",$data->id)}}"><i class="far fa-eye" style="font-size: 35px; "></i></a></th>
                  <th><a href="{{route("drives.edit",$data->id)}}"><i class="fas fa-edit"style="font-size: 35px;color:blue "></i></a></th>
                  <th><a href="{{route("drives.destroy",$data->id)}}"><i class="fas fa-trash-alt" style="font-size: 35px; color:red" ></i></a></th>
              </tr>
              @endforeach
        </div>

    </div>
</div>




@endsection

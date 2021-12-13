@extends('layouts.app')
@section('content')
<h1 class="text-center text-info"> Drive : {{$drive->id}}</h1>

<div class="container col-md-4">
    <div class="card">
        <img src="{{asset("upload/$drive->filename")}}" alt="">
        <div class="card-body">
        <h1>File title:{{$drive->title}}</h1>
        <p> File Description:{{$drive->description}}</p>
        </div>
        <a href="{{route("drives.download",$drive->id)}}" class="btn btn-info"><i class="fas fa-arrow-alt-circle-down" style="font-size: 48px;"></i></a>
    </div>
</div>




@endsection

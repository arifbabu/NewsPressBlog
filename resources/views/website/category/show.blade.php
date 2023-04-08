@extends('master')
@section('content')
<table class="table table-bordered mt-4">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tag Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cats as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>
            <a href="{{route('cat.edit', $item->id)}}" class="btn btn-primary">Edit</a>    
            <a href="{{route('cat.destroy', $item->id)}}" class="btn btn-warning">Delete</a>    
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

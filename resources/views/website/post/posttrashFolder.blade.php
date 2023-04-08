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
      @foreach ($trash as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>
            <a href="{{route('post.restore', $item->id)}}" class="btn btn-primary">Restore</a>    
            <a href="{{route('post.pDelete', $item->id)}}" class="btn btn-warning">Force Delete</a>    
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
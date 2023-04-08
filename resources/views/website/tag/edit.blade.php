@extends('master')
@section('content')
    <form method="POST" action="{{route('tag.update', $tag->id)}}" class=" offset-5 mt-5">
        @csrf
        <div class="form-group">
            <input type="text" name="name" value="{{$tag->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
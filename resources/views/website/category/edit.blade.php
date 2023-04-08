@extends('master')
@section('content')
    <form method="POST" action="{{route('cat.update', $cat->id)}}" class=" offset-5 mt-5">
        @csrf
        <div class="form-group">
            <input type="text" name="name" value="{{$cat->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
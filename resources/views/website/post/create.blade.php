@extends('master')

@section('content')
@include('website.partials.summernote')

<hr>
<h1 class="offset-3 mt-3" style="color:red; font-size:54px; font-weight: bold; font-family:'Courier New', Courier, monospace; text-transform: capitalize;">Create Post</h1>
<hr>

<form method="post" action="{{route('post.store')}}">
    @csrf
    <div class="form-group">
        <label for="postName" style="color: red; font-weight: bold;">Enter Post Name</label>
        <input type="text" name="name" class="form-control" id="postName" placeholder="Enter PostName">
    </div>
    <label for="postName" class="mt-1"><h3 style="color: red; font-weight: bold;">Select Category Name</h3></label> <br>
    <div class="form-check form-check-inline">
      @foreach ($categories as $item)
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="categories[]" value="{{$item->id}}"> &nbsp
      <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label> &nbsp&nbsp&nbsp&nbsp
      @endforeach
    </div> <br>
    <label for="postName" class="mt-1"><h3 style="color: red; font-weight: bold;">Select Tag Name</h3></label> <br>
    <div class="form-check form-check-inline">
      @foreach ($tags as $item)
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="tags[]" value="{{$item->id}}"> &nbsp
      <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label> &nbsp&nbsp&nbsp&nbsp
      @endforeach
    </div> <br> <br>
    <label for="postDescription" style="color: red; font-weight: bold;">Write Post Description</label>
    <textarea id="summernote" name="description"></textarea>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>



  {{-- Comment Form Starts --}}

      {{-- <form method="post" action="{{route('comment.store')}}">
        @csrf
        <div class="form-group">
            <label for="postName" style="color: red; font-weight: bold;">Enter Post Name</label>
            <input type="text" name="name" class="form-control" id="postName" placeholder="Enter PostName">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form> --}}


  {{-- Comment Form Ends --}}

  {{-- Reply Form Starts --}}

  {{-- Reply Form Ends --}}



@include('website.partials.summernotepart')
@endsection